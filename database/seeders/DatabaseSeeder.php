<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Event;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        // Category::factory(20)->create();
        Category::factory()->create([
            "name"=> "Seminar",
            "slug"=> "seminar",
        ]);
        Category::factory()->create([
            "name"=> "Workshop",
            "slug"=> "workshop",
        ]);
        Category::factory()->create([
            "name"=> "Bootcamp",
            "slug"=> "bootcamp",
        ]);
        Event::factory(10)->create();
        // Registration::factory(1000)->create();

        $admin = User::factory()->create([
            'name' => 'Admin',
            // 'jurusan' => 'Admin',
            // 'npm' => '00000000',
            'email' => 'admin@simanev.uti.ac.id',
        ]);

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@simanev.uti.ac.id',
        ]);

        ModelsRole::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        ModelsRole::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
