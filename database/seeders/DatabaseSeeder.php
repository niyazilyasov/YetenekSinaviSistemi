<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Middleware\is_super_admin;
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
         \App\Models\User::factory(10)->create(['is_super_admin'=>false]);
         \App\Models\GuzelSanatlarBasvuru::factory(30)->create();
        \App\Models\BesyoBasvuru::factory(30)->create();
         \App\Models\User::factory(1)->create(['email'=>'admin@admin.com','password'=>Hash::make('123123123'),'is_super_admin'=>1]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
