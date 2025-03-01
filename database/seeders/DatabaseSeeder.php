<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'status'=>'admin',
            'email_verified_at' => now(), 
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Afifi',
            'email' => 'afifiabdulhadi@gmail.com',
            'password' => bcrypt('122007'),
            'status'=>'transaksi',
            'email_verified_at' => now(), 
        ]);

        
       
    }
}
