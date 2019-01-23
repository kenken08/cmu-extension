<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\User as User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create();
    }
}
