<?php

use Illuminate\Database\Seeder;

class guestbooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guestbooks')->insert([
            'guest_fullname' => 'Ahmet Ünlü',
            'guest_email' => 'ahmetunlu@hotmail.com',
            'guest_phone' => '03125226363',
            'guest_text'  => 'Bu bir deneme mesajdır.',
            'guest_reply' => '0',
            'status' => '1'
            ]);
    }
}