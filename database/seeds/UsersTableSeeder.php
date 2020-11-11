<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_role' => 'Admin',
            'name' => 'Muhammad Hannan Ali',
            'username' => 'admin',
            'email' => 'mdhannan.info@gmail.com',
            'password' => bcrypt('root_admin12'),
        ]);


    }
}
