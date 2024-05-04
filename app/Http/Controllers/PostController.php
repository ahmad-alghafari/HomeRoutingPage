<?php

namespace App\Http\Controllers;

use App\Jobs\Posting;
use App\Models\post;
use App\Models\Log;
use App\Models\user;
use App\Models\share;
use App\Notifications\FailedpostingNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\file;
use App\Notifications\PostNotify;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\Loging;

class PostController extends Controller{
    public function index(Request $request){
        $userid = auth::user()->id;
        $posts = Share::whereNotIn('user_id', function ($query) use ($userid) {
            $query->select('user_blocker')
                ->from('blocks')
                ->where('user_blocked', $userid);
            })->whereIn('user_id', function ($query) use ($userid) {
                $query->select('user_follower')
                    ->from('follows')
                ->where('user_follow', $userid);
            })->latest()->Paginate(2);
        if($request->ajax()){
            $view = view('posts.load', compact('posts'))->render();
            return response()->json(['view' => $view, 'nextPageUrl' => $posts->nextPageUrl()]);
        }
        return view('home' , compact('posts'));
    }

    public function store(Request $request){

        if ($request->session()->token() !== $request->input('_token')) {
            return redirect()->back()->with('message', 'invalidToken');
        }

        $error_message = 'You cannot post empty content!';
        $request->validate([
            'images.*' => 'required_without_all:files,videos,voice,text|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'files.*' => 'required_without_all:images,videos,voice,text|max:5000',
            'videos.*' => 'required_without_all:files,voice,images,text|mimetypes:video/avi,video/mpeg,video/mp4|max:100000',
            'voice.*' => 'required_without_all:files,images,videos,text|mimetypes:audio/mpeg,audio/wav|max:10000',
            'text' => 'required_without_all:files,voice,videos,images']
            ,[
                'images.required_without_all' =>  $error_message,
                'files.required_without_all' => $error_message ,
                'videos.required_without_all' => $error_message ,
                'text.required_without_all' => $error_message ,
                'voice.required_without_all' => $error_message
            ]
        );

        $text = $request->text ? : '';
        $id = Auth::user()->id;

        $post = post::create([
            'user_id' => $id,
            'text' => $text ,
        ]);
        Loging::dispatch(
            $id ,
            'Create',
            'Add a New Post' ,
            'Posts',
            'home/posts/show/' . $post->id ,
            '',
        );
        // Log::create([
        //     'user_id' => $id ,
        //     'action' => 'Create',
        //     'description' => 'Posts' ,
        //     'url' => $post->id ,
        //     'properties' => 'nh',
        //     'on_table' => 'Posts',
      
        // ]);
        share::create([
            'user_id' => $id,
            'post_id' => $post->id,
        ]);

        Auth::user()->info->increment('posts_number');

        $fileTypes = ['images', 'videos', 'files', 'voice'];
        foreach ($fileTypes as $fileType) {
            if ($request->hasFile($fileType)) {
                foreach ($request->file($fileType) as $key => $file) {
                    $fileName = $id . '.' . time() . '.' . $key . '.' . $file->extension();
                    $filePath = 'posts_' . $fileType . '/' . $fileName;

                    file::create([
                        'post_id' => $post->id,
                        'file_path' => $filePath,
                        'file_type' => $fileType,
                        'prefix' => $file->extension(),
                    ]);
                

                    $file->move(public_path('posts_' . $fileType), $fileName);
                    
                }
                Loging::dispatch(
                    $id ,
                    'Create',
                    'Add a New Post' ,
                    'Files',
                    'home/posts/show/' . $post->id ,
                    '',
                );
            }
        }
        //log
        
//        notifications
        Posting::dispatch($post , Auth::user()->id);
        return redirect()->back()->with('message', 'processing');

    }

    // public function read_all(Request $request)
    // {
    //     $UnreadNotification = Auth()->user()->unreadNotifications;
    //     if($UnreadNotification) {
    //         $UnreadNotification->markAsRead();
    //         return back();
    //     }
    // }

    public function show(post $post){
        return view('posts.show' , compact('post'));

    }

    public function showpost($showpost){
        $post = Post::find($showpost);
        return $post ? view('posts.show' , compact('post')) : back() ;
        // return view('posts.show' , compact('post'));
    }

    public function edit($id)
    {
        $post = post::find($id);
        if(($post->user->id != Auth::user()->id) || ($post == null)){
            return back();
        }
        return view('posts.edit' , compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $user = $post->user->id;
        if(($user != Auth::user()->id) || ($post == null)){
            return back();
        }
        $post->text = $request->input('text');
        $post->update();
        Loging::dispatch(
            $user,
            'Update',
            'Edit His Post' ,
            'Posts',
            'home/posts/show/' . $post->id ,
            '',
        );
        return view('posts.show' , compact('post'));
    }


    public function destroy($id){
        // Check if the post exists
        $post = Post::find($id);
        $user = $post->user->id ;
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }

        // Check if the current user is the owner of the post

        if ($post->user->id != Auth::user()->id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this post');
        }

        // Delete associated files
        $files = File::where('post_id', $post->id)->get();

        foreach ($files as $file) {
            $filePath = public_path($file->file_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $file->delete();
        }

        $post->delete();
        Loging::dispatch(
            $user,
            'Delete',
            'Delete His Post' ,
            '',
            '',
            '',
        );
        auth::user()->info->decrement('posts_number');
        return redirect()->back()->with('success', 'Post deleted successfully');
    }

}
