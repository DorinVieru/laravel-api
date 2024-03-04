<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Project;

use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<25; $i++){
            $project = new Project();
            $project->title = $faker->words(3, true);
            $project->description = $faker->text(150);
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
