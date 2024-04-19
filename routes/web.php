<?php

use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlockController;
use App\Models\User;
use App\Http\Controllers\DomainController;

use Illuminate\Contracts\Auth\Guard;

Route::get('/' , function(){
    return view("welcome");
})->name("welcome");

Route::get('/test' , function(){
    return view("welcome");
})->name("welcome")->middleware('servicing');

Route::get('servicing' , function(){
    return view('servicing');
})->name('servicing');

Route::get('/domains' , [DomainController::class , "index"])->name("domains.index");
Route::get('/domains/show/{domain}' , [DomainController::class , "show"])->name("domains.show");
Route::get("/domains/create" , function(){
    return view("domains.create");
})->middleware("auth" , "verified")->name("domains.create");
Route::post('/domains', [DomainController::class ,'store'])->middleware("auth" , "verified")->name("domains.store");



Route::name('home.')->middleware(['auth','verified','servicing'])->prefix('home/')->group(function (){

    Route::get('notificaions' , function(){
        return view('notifications');
    })->name('notificaions');

    Route::get('chats' , function (){
        return view('message');
    })->name("chats");

    Route::resource('posts',PostController::class)->except('show');

    Route::get('posts/show/{post}' ,[PostController::class , 'show'])->name('posts.show')->middleware('blockPost');
    Route::get('posts/showpost/{postshow}' ,[PostController::class , 'showpost'])->name('posts.showpost')->middleware('blockPostShow');

    Route::view('search' ,'search')->name('search');

    Route::get('users/show/{user}' ,[UserController::class , 'show'])->name('users.show')->middleware('block');
    Route::get('users/show/{usershow}' ,[UserController::class , 'showuser'])->name('users.usershow')->middleware('blockUser');


    Route::post('users/settings' , [UserController::class , 'settings'])->name('users.settings.post');
    Route::view('users/settings/{user}','users.settings')->name('users.settings')->middleware('checkUserSettings');
    Route::post('users/settings/password' ,[UserController::class , 'newpass'] )->name('users.settings.updatepassword');

    Route::resource('blocks', BlockController::class)->except('destroy');
    Route::delete('blocks/{user}' , [BlockController::class , 'destroy'])->name('blocks.destroy');


    Route::post('users/photo' ,[UserController::class , 'addphoto'])->name('users.photo.store');
    Route::delete('users/photo/{user}' ,[UserController::class , 'deletephoto'])->name('users.photo.destroy');

    Route::get('users/followers/{user}' , [UserController::class , 'followersPage'])->name('users.followers');
    Route::get('users/following/{user}' , [UserController::class , 'followingPage'])->name('users.following');


});

Auth::routes(['verify' => true]);







