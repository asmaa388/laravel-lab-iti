<?php

namespace Database\Seeders;
use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;



class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()
        ->count(500)
        ->create([
            'title' => Str::random(10),
            'description' => Str::random(20),
            'created_at'=>'	23-04-08'
        ]);
    
    }
}
