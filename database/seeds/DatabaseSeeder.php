<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class, config('seeds.quantity.user'))->create();
        factory(\App\Robot::class, config('seeds.quantity.robot'))->create();
        factory(\App\Alert::class, config('seeds.quantity.alert'))->create();
    }
}
