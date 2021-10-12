<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Categori;
use App\Models\Tags;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(2)->create();

        User::create([
            'name' => 'aldiandwi',
            'username' => 'aldian',
            'email' => 'aldian@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Tags::create([
            'nama_tags' => 'Laravel',
            'slug_tags' => 'laravel'
        ]);

        Tags::create([
            'nama_tags' => 'Codeigniter',
            'slug_tags' => 'codeigniter'
        ]);

        Tags::create([
            'nama_tags' => 'Node JS',
            'slug_tags' => 'node-js'
        ]);

        Tags::create([
            'nama_tags' => 'Javascript',
            'slug_tags' => 'javascript'
        ]);


        Categori::create([
            'nama' => 'Programming',
            'slug' => 'programming'
        ]);

        Categori::create([
            'nama' => 'Web design',
            'slug' => 'web-design'
        ]);

        Categori::create([
            'nama' => 'Trading dan saham',
            'slug' => 'trading-dan-saham'
        ]);

        Categori::create([
            'nama' => 'Fullstack',
            'slug' => 'fullstack'
        ]);

        //membuat data random yang sudah diset difolder database/factory menggunakan library faker laravel
        Blog::factory(20)->create();
    }
}
