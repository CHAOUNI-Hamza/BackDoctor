<?php

namespace Database\Seeders;

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
        //\App\Models\Role::create(['name' => 'admin']);
        //\App\Models\Role::create(['name' => 'editor']);
        //\App\Models\Role::create(['name' => 'viewer']);

        \App\Models\User::factory(10)->create();
        //\App\Models\Role::factory(3)->create();
        \App\Models\Doctor::factory()->count(5)->create();
        \App\Models\Patient::factory()->count(10)->create();
        /*$adminRole = \App\Models\Role::where('name', 'admin')->first();
        $editorRole = \App\Models\Role::where('name', 'doctor')->first();
        $viewerRole = \App\Models\Role::where('name', 'patient')->first(); 

        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ])->roles()->attach($adminRole);

        \App\Models\User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => bcrypt('password'),
        ])->roles()->attach($editorRole);

        \App\Models\User::create([
            'name' => 'Viewer User',
            'email' => 'viewer@example.com',
            'password' => bcrypt('password'),
        ])->roles()->attach($viewerRole);*/
    }
}
