<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Task;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for($i=0;$i<50;$i++){
            Task::create([
                'title'=> $faker->sentence(),
                'description'=> $faker->paragraph(),
                'long_description'=>$faker->optional()->text(),
                'completed'=>$faker->boolean(),
            ]);
        }
        
    }
}
