<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->words(3, true);
            $project->slug = Str::of($project->title)->slug('-');
            $project->content = $faker->text(100);
            $project->img = $faker->imageUrl(240, 150, 'Projects', true, $project->title, true, 'png');
            $project->url1 = $faker->url();
            $project->url2 = $faker->url();
            $project->save();
        }
    }
}