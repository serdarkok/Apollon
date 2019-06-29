<?php

use Illuminate\Database\Seeder;

class settingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('settings')->insert(
            [
                'title' => 'Yeni Bir Web Sitesi',
                'description' => 'Apollon Web Template',
                'keywords' => 'web, apollon, template, serdar, kok',
                'status' => true
            ]);
    }
}