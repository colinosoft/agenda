<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 1 ; $i++) {
            $user = new User();
            $user->name = "Ivan Colino";
            $user->email = "ivan@colino.com";
            $user->password = bcrypt('123456');
            $user->save();
        }

        User::factory(99)->create();
    }
}
