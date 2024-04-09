<?php

use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlockController;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;

Route::get('/' , function(){
    return view("welcome");
});

Route::get('/domains' , function(){
    return view("domains");
});




Route::name('home.')->middleware(['auth','verified'])->prefix('home/')->group(function (){



    Route::get('chats' , function (){
        return view('message');
    })->name("chats");

    Route::resource('posts',PostController::class)->except('show');
    Route::get('posts/show/{post}' ,[PostController::class , 'show'])->name('posts.show')->middleware('blockPost');
    Route::view('search' ,'search')->name('search');

    Route::get('users/show/{user}' ,[UserController::class , 'show'])->name('users.show')->middleware('block');
    Route::post('users/settings' , [UserController::class , 'settings'])->name('users.settings.post');
    Route::view('users/settings/{user}','users.settings')->name('users.settings')->middleware('checkUserSettings');

    Route::resource('blocks', BlockController::class)->except('destroy');
    Route::delete('blocks/{user}' , [BlockController::class , 'destroy'])->name('blocks.destroy');


    Route::post('users/photo' ,[UserController::class , 'addphoto'])->name('users.photo.store');
    Route::delete('users/photo/{user}' ,[UserController::class , 'deletephoto'])->name('users.photo.destroy');

});

Auth::routes(['verify' => true]);







