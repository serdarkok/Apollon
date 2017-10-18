<?php

use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(
            [
                'name' => 'Serdar',
                'surname' => 'Kök',
                'password' => bcrypt('282216'),
                'email' => 'kokserdal@gmail.com',
                'phone' => '05334681406',
                'authority' => '1',
                'status' => true,
            ]);


    }
}