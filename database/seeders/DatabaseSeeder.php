<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'name'=>'Admin',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>'12345678',
            'utype'=>'AD'
        ]);

        User::factory(1)->create([
            'name'=>'Author',
            'username'=>'author',
            'email'=>'author@gmail.com',
            'password'=>'12345678',
            'utype'=>'AU'
        ]);

        User::factory(1)->create([
            'name'=>'User',
            'username'=>'user',
            'email'=>'user@gmail.com',
            'password'=>'12345678',
            'utype'=>'N'
        ]);
        User::factory(2)->create();
        Category::factory(5)->create();
        Post::factory(50)->create();
    }
}
