<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnologies = ['css', 'js', 'vue', 'sql', 'php', 'laravel'];

        foreach ($tecnologies as $tecnology_name) {
           $new_tecnology = new Tecnology();
           $new_tecnology->name = $tecnology_name;
           $new_tecnology->slug = Str::slug($tecnology_name);
           $new_tecnology -> save();

        }
    }
}
