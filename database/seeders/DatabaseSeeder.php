<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Norah Almutairi',
            'email' => 'norahmutairi@outlook.sa',
            'password' => Hash::make('12345678')
        ]);

        $this->call([
            CategorySeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
            MessageSeeder::class
        ]);
    }
}
