<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;
use App\Models\share;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user){
        $posts = share::where('user_id',$user->id)->latest()->get();
        return view('users.profile' , compact('posts' , 'user'));
    }

    public function showuser( $usershow){
        $user = User::find($usershow);
        if($user != null){
            $posts = share::where('user_id',$user->id)->latest()->get();
            return view('users.profile' , compact('posts' , 'user'));
        }else{
            return back()->with('error' , "user not exists!");
        }

    }

    public function settings(Request $request){
        $user = Auth::user();

        $request->validate([
            'name' => 'required|unique:App\Models\User,name,'.$user->id,
            'email' => 'required|unique:App\Models\User,email,'.$user->id,
            'phone' => 'nullable|numeric',
            'overview' => 'nullable|max:200',
            'community_status' => 'nullable|in:single,married,divorced,in a relationship,taken,empty',
            'job' => 'nullable|max:20',
            'birth' => 'nullable|date',
            'address' => 'nullable',
        ]);
        // dd($request->name);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if($request->community_status == 'empty'){
            $user->info()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $request->phone,
                    'overview' => $request->overview,
                    'community_status' => null,
                    'job' => $request->job,
                    'birth' => $request->birth,
                    'address' => $request->address,
                ]
            );
        }else{
            $user->info()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $request->phone,
                    'overview' => $request->overview,
                    'community_status' => $request->community_status,
                    'job' => $request->job,
                    'birth' => $request->birth,
                    'address' => $request->address,
                ]
            );
        }

        activity()
        ->by($user)
        // ->on()
        ->event('update')
        ->log('test');

        return redirect()->back()->with(['success' => 'Updated Successfully!']);
    }

    public function addphoto(Request $request){
        $request->validate([
            'image' => "required|image|mimes:jpeg,png,jpg,svg|max:3000"
        ]);

        if(Auth::user()->photo != null){
            $image =  public_path(Auth::user()->photo->path);
            if (file_exists($image)) {
                unlink($image);
            }
        }

        $image = $request->file('image');
        $imageName = Auth::user()->id . Auth::user()->name . $image->extension();
        $path = 'import/assets/images/avatar/' . $imageName ;

        Auth::user()->photo()->updateOrCreate(['path' => $path]);

        $request->file('image')->move(public_path('import/assets/images/avatar' ), $imageName);


        return redirect()->route('home.users.show' , Auth::user());
    }

    public function deletephoto($id){
        if(Auth::user()->photo != null){
            $image =  public_path(Auth::user()->photo->path);
            if (file_exists($image)) {
                unlink($image);
            }
            Auth::user()->photo()->delete();
        }
        return redirect()->route('home.users.show' , Auth::user());

    }

    public function newpass(Request $request): void {
        if(base64_decode($request->password) == Auth::user()->password){
            if($request->newpass == $request->newpasscheck){
                Auth::user()->update();
            }
        }else{
            redirect()->back()->with('error','The Curreant Password Isnot Correct!');
        }
    }

    public function followersPage($id){
        $user_id = $id ;
        $page = 'followers';
        return view('users.followers' , compact('user_id' , 'page'));
    }
    public function followingPage($id){
        $user_id = $id ;
        $page = 'following';
        return view('users.followers' , compact('user_id' , 'page'));
    }



}
