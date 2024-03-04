<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Type;

use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 7; $i++) {
            $type = new Type();
            $type->name = $faker->words(2, true);
            $type->slug = Str::slug($type->name, '-');

            $type->save();
        }
    }
}
