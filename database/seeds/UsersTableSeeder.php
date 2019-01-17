<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\User as User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<6;$i++){
            DB::table('users')->insert([
                'firstname' => str_random(10),
                'lastname' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'profile_image' => 'noimage.png',
            ]);
        }
    }
}
