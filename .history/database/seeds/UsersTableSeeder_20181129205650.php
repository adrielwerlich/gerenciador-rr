<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'role_id'  => '1',
            'name'     => 'adriel',
            'email'    => 'adrielwerlich@gmail.com',
            'avatar'   => 'users/default.png',
            'password' => bcrypt('123456'),
        ]);

        // User::create([
        //     // 'role_id'  => '2',
        //      'name'     => 'user',
        //      'email'    => 'user@user.com',
        //      'avatar'   => 'users/default.png',
        //      'password' => bcrypt('123456'),
        //  ]);
    }
}
