<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            ProjectSeeder::class,
        ]);

        $adminId = Str::uuid();

        DB::table('users')->insert([
            'id' => $adminId,
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => \Spatie\Permission\Models\Role::where('name', 'admin')->value('id'),
            'model_type' => \App\Models\User::class,
            'model_id' => $adminId,
        ]);
    }
}
