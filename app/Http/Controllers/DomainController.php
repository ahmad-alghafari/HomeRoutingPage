<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\domain;
class DomainController extends Controller
{
    public function index(){
        $domains = domain::latest()->Paginate(1);
        return view("domains.index" , compact('domains'));
    }

    public function create(){
        return view("domains.create");
    }
    public function store(Request $request){
        dd($request);

        $request->validate([
            'name' => 'require | min:8 | max:24 | unique:App\Models\domain,name',
            'country' => 'required | min:2 | max:4 | uppercase ',
            'language' => 'required | in:arabic,english,french,spanish,hindi,latin,chinese,armenian,russian',
            'type' => 'required | in:sport,food,educaion,policy,medicine,general',
            'domain' => 'required | in:com,net,org,int,mil,gov,edu',
            'url' => 'required |  url:http,https | min:15 | max:20',
            'description' => 'required | min:60 | max:300',  
            'icon' => 'required | mimes:jpg,png | image',
        ]);

        if($request->hasFile('icon')){
            $file = $request->file('icon');
            $extension = $file->extension() ;
            $name = $request . '.' . time() . "." . $extension ;
            $path = 'import/images/domains/';
            $image_path = $path . $name;
            $file->move(public_path($path) , $name);
        }

        $social = [
            'facebook' => $request->social_facebook ,
            'instagram' => $request->social_instagram ,
            'youtube' => $request->social_youtube ,
            'x' => $request->social_x ,
        ];

        $constraind = [];

        if($request->racism == 'on'){
            $constraind += 'racism';
        }
        if($request->truculence == 'on'){
            $constraind += 'truculence';
        }
        if($request->politics == 'on'){
            $constraind += 'politics';
        }
        if($request->pornography == 'on'){
            $constraind += 'pornography';
        }
        if($request->religions == 'on'){
            $constraind += 'religions';
        }

        $domains = domain::create([
            'name' => $request->name , 
        ]);




        return redirect()->route('home.posts.index');
    }
}