<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/all' , function (){
    $users =  User::with('photo:user_id,path')->get(['id','name','email','status']);

    $response = [];
    foreach ($users as $user) {
        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'status' => $user->status,
            'avatar_path' => $user->photo != null ? 'http://192.168.43.60:8000/' . $user->photo->path : 'http://192.168.43.60:8000/import/assets/images/avatar/placeholder.jpg',
        ];
        $response[] = $userData;
    }
    return $response;
});

Route::get('/users/search' , function (Request $request){
    $attribute = $request->query();
    $userName = $attribute['userName'];
    $users = User::where('name', 'like', '%'.$userName.'%')->get(['id', 'name', 'email', 'status']);

    $response = [];
    foreach ($users as $user) {
        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'status' => $user->status,
            'avatar_path' => $user->photo !=null ? 'http://192.168.43.60:8000/' . $user->photo->path : 'http://192.168.43.60:8000/import/assets/images/avatar/placeholder.jpg',
        ];
        $response[] = $userData;
    }
    return $response;
});

Route::get('/users/show' , function (Request $request){
    $attribute = $request->query();
    $userId = $attribute['user'];
    $user = User::find($userId);

    return $userData = [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'status' => $user->status,
        'avatar_path' => $user->photo != null ? 'http://192.168.43.60:8000/' . $user->photo->path : 'http://192.168.43.60:8000/import/assets/images/avatar/placeholder.jpg',
    ];
});

