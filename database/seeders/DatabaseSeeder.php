<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    public function run(): void {
        $time = Carbon::now();
        $settings = [
            //posts
            [
                'page_name' => 'All Posts Page',
                'route_name'=>'home.posts.index',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Show the post in full page',
                'route_name'=>'home.posts.show',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Show The Post In All Page.',
                'route_name'=>'home.posts.showpost',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Posting',
                'route_name'=>'home.posts.store',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Edite Posting.',
                'route_name'=>'home.posts.edit',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Updating Posting.',
                'route_name'=>'home.posts.update',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Delete Post.',
                'route_name'=>'home.posts.destroy',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            //notificaions
            [
                'page_name' => 'Show all notificaions.',
                'route_name'=>'home.notificaions',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            //domains
            [
                'page_name' => 'Create A New Domain',
                'route_name'=>'domains.store',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Show Page That Create Domains',
                'route_name'=>'domains.create',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Show The Domains Details.',
                'route_name'=>'domains.show',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Show All The Domains.',
                'route_name'=>'domains.index',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            //search
            [
                'page_name' => 'Search About Anythings.',
                'route_name'=>'home.search',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            //user
            [
                'page_name' => 'Visit User Profile',
                'route_name'=>'home.users.show',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Visit User Profile',
                'route_name'=>'home.users.usershow',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Show All Following Of User.',
                'route_name'=>'home.users.following',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Show All Followers Of User.',
                'route_name'=>'home.users.followers',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Change Password',
                'route_name'=>'home.users.settings.updatepassword',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Change Password.',
                'route_name'=>'home.users.settings.updatepassword',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            //settings
            [
                'page_name' => 'Show Settings Page.',
                'route_name'=>'home.users.settings',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Change The Settings.',
                'route_name'=>'home.users.settings.post',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            //photo chaning
            [
                'page_name' => 'Add New Avatar.',
                'route_name'=>'home.users.photo.store',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Delete Avatar.',
                'route_name'=>'home.users.photo.destroy',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            //blocks
            [
                'page_name' => 'Block User.',
                'route_name'=>'home.blocks.store',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            [
                'page_name' => 'Unblock User.',
                'route_name'=>'home.blocks.destroy',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ],
            //chating
            [
                'page_name' => 'Chating.',
                'route_name'=>'home.chats',
                'servicing'=> "0" ,
                'created_at'=> $time,
                'updated_at'=> $time,
            ]
        ];

        foreach($settings as $s){
            Setting::create($s);
        }
    }
}
