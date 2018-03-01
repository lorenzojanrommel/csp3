<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// user status active
       DB::table('status')->insert([
       	'status' => 'active',
       	'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
       	'updated_at' => Carbon::now()->format('Y-m-d h:i:s'),
       ]);
       // user status deactivate
       DB::table('status')->insert([
       	'status' => 'deactivate',
       	'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
       	'updated_at' => Carbon::now()->format('Y-m-d h:i:s'),
       ]);
       // user role admin
       DB::table('role')->insert([
       	'role' => 'admin',
       	'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
       	'updated_at' => Carbon::now()->format('Y-m-d h:i:s'),
       ]);
       // user role regular
       DB::table('role')->insert([
       	'role' => 'regular',
       	'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
       	'updated_at' => Carbon::now()->format('Y-m-d h:i:s'),
       ]);
       // user admin default
       DB::table('users')->insert([
       	'name' => 'Jan Rommel',
       	'email' => 'admin@test.com',
       	'password' => bcrypt('password'),
       	'user_status' => '1',
       	'user_role' => '1',
       	'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
       	'updated_at' => Carbon::now()->format('Y-m-d h:i:s'),
       ]);
    }
}
