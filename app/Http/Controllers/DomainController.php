<?php

namespace App\Http\Controllers;

use App\Models\enviroment;
use Illuminate\Http\Request;
use App\Models\domain;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    public function index(){
        $domains = domain::where('online' , 'yes')->latest()->Paginate(2);
        return view("domains.index" , compact('domains'));
    }

    public function create(){
        return view("domains.create");
    }
    public function store(Request $request){
        // dd($request);

        $request->validate([
            'name' => 'require | min:8 | max:24 | unique:App\Models\domain,name',
            'country' => 'required | min:2 | max:4 | uppercase ',
            'language' => 'required | in:arabic,english,french,spanish,hindi,latin,chinese,armenian,russian',
            'type' => 'required | in:sport,food,educaion,policy,medicine,general',
            'domain' => 'required | in:com,net,org,int,mil,gov,edu',
            'url' => 'required |  url:http,https | min:15 | max:20',
            'description' => 'required | min:60 | max:300',
            'icon' => 'required | mimes:jpg,png | image',
            'name' => 'required|min:8|max:24|unique:App\Models\domain,name',
            'country' => 'required|min:2|max:4|uppercase',
            'language' => 'required|in:arabic,english,french,spanish,hindi,latin,chinese,armenian,russian',
            'type' => 'required|in:sport,food,education,policy,medicine,general',
            'domain' => 'required|in:com,net,org,int,mil,gov,edu',
            'url' => 'required|url|min:15|max:35',
            'description' => 'required|min:60|max:300',
            'icon' => 'required|mimes:jpg,png|image',
        ]);

        if($request->hasFile('icon')){
            $file = $request->file('icon');
            $extension = $file->extension() ;
            $name = $request->name . '.' . time() . "." . $extension ;
            $path = 'import/assets/images/domains/';
            $photo_path = $path . $name;
            $file->move(public_path($path) , $name);
        }

        // dd($request);
        $social = [
            'facebook' => $request->social_facebook ,
            'instagram' => $request->social_instagram ,
            'youtube' => $request->social_youtube ,
            'x' => $request->social_x ,
        ];

//        $constraind = constrain();
        $constraind =  [
            'racism' => $request->racism == 'true' ? true : null ,
            'truculence' => $request->truculence == 'true' ? true : null ,
            'politics' => $request->politics == 'true' ? true : null ,
            'pornography' => $request->pornography == 'true' ? true : null ,
            'religions' => $request->religions == 'true' ? true : null ,
        ];

        $domains = domain::create([
            'name' => $request->name ,
            'user_id' => Auth::user()->id ,
            'name' => $request->name ,
            'description' => $request->description ,
            'country' => $request->country,
            'language' => $request->language,
            'type' => $request->type,
            'domain' => $request->domain,
            'url' => $request->url,
            'photo_path' => $photo_path,
            'social' => json_encode($social),
            'constraind' => json_encode($constraind),
        ]);

        return redirect()->route('home.posts.index');
    }
    public function constrain($var = "local"){
        $jsonConstrainds = enviroment::first()->constrainds;
        $arrayContrainds = json_decode($jsonConstrainds, true);
        if($var == "local"){
            foreach ($arrayContrainds as $key => &$constraind) {
                foreach ($constraind as &$value) {
                    $value = "";
                }
            }
        }
        return $arrayContrainds;
    }

    public function show(domain $domain){
        $constrainds = $this->constrain("global");
        $social = json_decode($domain->social , true);
        $arraySocial = [];

        foreach ($social as $key => $value) {
            if($value != null){
                $arraySocial[$key] = $value;
            }
        }
//        dd($arraySocial);
        return view('domains.show' , compact ('domain' ,'constrainds' , 'arraySocial' ));
    }
}
