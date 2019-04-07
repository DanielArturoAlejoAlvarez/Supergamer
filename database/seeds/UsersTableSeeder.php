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
        factory(SuperGamer\User::class, 29)->create();

        SuperGamer\User::create([
            'name'      =>  'Caspar Lee',
            'email'     =>  'casplee@yahoo.com',
            'password'  =>  bcrypt('password1')
        ]);
    }
}
