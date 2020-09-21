<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Hash;
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
        // Users

        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'User 2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'User 3',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'User 4',
            'email' => 'user4@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::factory(5)->create();

        // Permissions
        DB::table('permissions')->insert([
            'key' => 'creator'
        ]);

        // Permission_User
        DB::table('permission_user')->insert([
            'user_id' => '1',
            'permission_id' => '1'
        ]);
        DB::table('permission_user')->insert([
            'user_id' => '2',
            'permission_id' => '1'
        ]);
        DB::table('permission_user')->insert([
            'user_id' => '3',
            'permission_id' => '1'
        ]);
    }
}
