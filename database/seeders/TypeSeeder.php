<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Html','Css','JavaScript','VueJS','ViteJS','PHP','Laravel','Bootstrap','Sass','Svelte'];
        foreach ($types as $type)
        {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Str::slug($newType->name,'-');
            $newType->save();
        }
    }
}