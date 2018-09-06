<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class bizeulasin extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $phone, $email, $sube, $mesaj;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($r)
    {
        $this->name = $r->name;
        $this->phone = $r->phone;
        $this->email = $r->email;
        $this->sube = $r->sube;
        $this->mesaj = $r->mesaj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('serdar@iksirweb.com', 'Serdar Kök')
            ->subject('Ulaşım Formu')
            ->view('mails.bize-ulasin');
    }
}
