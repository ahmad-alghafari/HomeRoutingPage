<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteAccount;
use App\Jobs\DeleteData;
use App\Jobs\Loging;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
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
        if($user != null ){
            Loging::dispatch(
                Auth::user()->id,
                'show',
                Auth::user()->name . ' visit ' . $user->name  . ' page.' ,
                'share' ,
                'home/users/show/' . $user->id ,
                ''
            );
            return view('users.profile' , compact('posts' , 'user'));
        }
        return back();
    }

    public function showuser($usershow){
        $user = User::find($usershow);
        if($user != null){
            $posts = share::where('user_id',$user->id)->latest()->get();
            return view('users.profile' , compact('posts' , 'user'));
        }else{
            return back()->with('error' , "user not exists!");
        }

    }

    public function setting_view($user){
        $active = 'setting-account';
        return view('users.settings' )->with(['active' => $active]);
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


        return redirect()->back()->with([
            'active' => 'setting-account',
            'message' => 'account_save_changed_success'
        ]);
    }

    public function addphoto(Request $request){
        $request->validate([
            'image' => "required|image|mimes:jpeg,png,jpg,svg|max:10000"
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

        $checked = Auth::user()->photo()->updateOrCreate(['path' => $path]);

        if ($checked) {
            $request->file('image')->move(public_path('import/assets/images/avatar' ), $imageName);
            return redirect()->back()->with(['active'=> 'setting-photo' , 'message'=>'add_photo_success']);
        } else {
            return redirect()->back()->with([
                'active' => 'setting-photo',
                'message' => 'add_photo_error'
            ]);
        }

    }

    public function deletephoto($user){
        $user = User::find($user);
        if($user){
            if($user->photo != null){
                $image =  public_path($user->photo->path);
                if (file_exists($image)) {
                    unlink($image);
                }
                $user->photo()->delete();
            }
            return redirect()->back()->with([
                'active' => 'setting-photo',
                'message' => 'delete_photo_success',
            ]);
        }
        return redirect()->back()->with([
            'active'=> 'setting-photo',
            'message'=>'delete_photo_failed',
        ]);


    }

    public function newpass(Request $request) {
        $request->validate([
            'password' => 'required|min:8',
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            $request->validate([
                'new_password' => 'required|different:password|min:8',
                'new_password_confirm' => 'required|same:new_password|min:8'
            ] , [
                    'new_password.different' => 'New password and current password must be different.',
                    'new_password_confirm.same' =>'Confirm password must be same to new password.',
            ]);
            Auth::user()->update([
                'password' => Hash::make($request->newpass),
            ]);
            return redirect()->back()->with([
                'active'=> 'setting-password',
                'message'=> 'password_changed_success'
            ]);
        }

        return redirect()->back()->with([
            'active' => 'setting-password',
            'message'=>'password_error' ,
        ]);
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

    public function destroy(Request $request ,User $user){
        if($user->id != Auth::user()->id){
            return "ss";
            //spam
        }
        $request->validate([
            'check' => 'required' ,
        ]);
        if($request->has('deleteAccount')){

            Auth::guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

//            If there is pressure on the server
            $user->update([
                "role" => 4, //user cant enter to system
            ]);

            DeleteAccount::dispatch($user);
            return redirect()->route('login');

        }elseif($request->has('deleteData')){

            DeleteData::dispatch($user);
            return back()->with([
                'message' => 'delete_data_processing',
            ]);
        }
        return back()->with([
            'message' => 'delete_data_error_went_wrong',
        ]);
    }

}
