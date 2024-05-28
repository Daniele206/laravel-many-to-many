<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Functions\Helper;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('projects');
        foreach($projects as $project){
            if(Helper::checkType($project['type'], new Type())){
                $new_type = new Type();
                $new_type->name = $project['type'];
                $new_type->slug = Helper::generateSlug($new_type->name, new Type());

                $new_type->save();
            }
        }
    }
}
