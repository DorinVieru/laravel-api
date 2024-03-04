<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Technology;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $array = [
            [
                'name' => 'HTML',
                'color' => 'html_badge_blue'
            ],
            [
                'name' => 'CSS',
                'color' => 'css_badge_red'
            ],
            [
                'name' => 'JavaScript',
                'color' => 'javascriptl_badge_yellow'
            ],
            [
                'name' => 'VueJs',
                'color' => 'vuejs_badge_green'
            ],
            [
                'name' => 'PHP',
                'color' => 'php_badge_violet'
            ],
            [
                'name' => 'Laravel',
                'color' => 'laravel_badge_brown'
            ],
            [
                'name' => 'Phyton',
                'color' => 'phyton_badge_orange'
            ],
        ];
        
        foreach ($array as $item) {
            $technology = new Technology();
            $technology->name = $item['name'];
            $technology->badge_class = $item['color'];
            $technology->slug = Str::slug($technology->name, '-');

            $technology->save();
        }
    }
}
