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
        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'username' => 'adminusername',
            'email' => 'test@admin.com',
            'password' => '$2a$10$aF4hCYkVmnTYFKz2npkoZOKcEM0Dadm9D4VFuaWxUh5F52/zz3wPO' //password
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test Admin 2',
            'username' => 'adminusername2',
            'email' => 'test2@admin.com',
            'password' => '$2a$10$NNnf5ynL/6UGvaRqG1gExu0eJ0ZYzpaV9dmzlYHt69CdfmpQMvZJK' //password2
        ]);

        \App\Models\Products::factory()->count(100)->create();
    }
}
