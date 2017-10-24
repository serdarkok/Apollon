<?php

use Illuminate\Database\Seeder;

class languagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'language_name' => 'Türkçe',
            'language_short_name' => 'tr',
            'flag' => '/images/flags/tr.png'
        ]);
    }
}
