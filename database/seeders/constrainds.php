<?php

namespace Database\Seeders;

use App\Models\enviroment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class constrainds extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contrainds = [
            ['racism' => "Speaking racist about a specific thing or race and speaking about it and treating it as if it is normal." ],
            ['truculence' => "Circulating words, pictures, and videos showing violence and showing the true picture of violence that is not normally visible to everyone who does not want to see it." ],
            ['politics' => "Talking about politics that supports or opposes different points of view about what is going on, about the general situation of countries, wars, etc." ],
            ['pornography' =>"Publishing scandalous and obscene images that are inappropriate for all ages and all religions, which offends public taste and educational custom." ],
            ['religions' => "Insulting and insulting religions, speaking about them with mockery and sarcasm, or claiming to create a new religion or sect."]
        ];
            enviroment::updateOrCreate([
                'id' => 1,
                'constrainds' => json_encode($contrainds),
            ]);
    }
}
