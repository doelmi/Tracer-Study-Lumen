<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $hasher = app()->make('hash');

        DB::table('users')->insert([
            'username' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => $hasher->make('adminftutm')
        ]);
    }
}
