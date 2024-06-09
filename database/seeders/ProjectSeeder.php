<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Tecnology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run( Faker $faker ): void
    {
        $types = Type::all();  //Collection di oggetti type

        // pluck() mi crea un array di id
        $category_ids = $types->pluck('id')->all();


        $tecnologies = Tecnology::all();

        $tecnologies_ids = $tecnologies->pluck('id')->all();



        for ($i=0; $i < 10 ; $i++) { 
 
            $project = new Project();

            $name = $faker->sentence(3);
            $project->name = $name;
            $project->slug = Str::slug($name);
            $project->date = $faker->dateTimeBetween("-1 week","+1 week");
            $project->type_id = $faker->randomElement($category_ids);
            
            // fino a qui il project non ha ancora un id
        
            $project->save();
        
            // qui il project ha un id e possiamo usare il metodo attach

            // prendendo un numero random di id di tecnologies
            $random_tecnologies_ids = $faker->randomElements($tecnologies_ids, null);
            $project->tecnologies()->attach($random_tecnologies_ids);
            
        }
    }
}
