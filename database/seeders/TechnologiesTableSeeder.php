<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Functions\Helper;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = config('technologies');
        foreach($technologies as $technology){
            $new_technology = new Technology();
            $new_technology->name = $technology['name'];
            $new_technology->slug = Helper::generateSlug($new_technology->name, new Technology());

            $new_technology->save();
        }
    }
}
