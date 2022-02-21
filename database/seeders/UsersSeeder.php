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
        for ($i=0; $i < 10 ; $i++) { 
            $user = new User();
            $user->name = "Usuario$i";
            $user->email = "u@$i.com";
            $user->password = bcrypt('123456');
            $user->save();
        }
    }
}
