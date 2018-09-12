<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class telefonugonder extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $phone;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($r)
    {
        $this->name = $r->name;
        $this->phone = $r->phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@huzurevi.com.tr', 'Huzurevi WEB')
            ->subject('Beni Ara')
            ->view('mails.beni-ara');
    }
}
