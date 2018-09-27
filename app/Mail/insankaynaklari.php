<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class insankaynaklari extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $phone, $email, $sube, $tecrubeler, $pozisyon;
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
        $this->tecrubeler = $r->tecrubeler;
        $this->pozisyon = $r->pozisyon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@huzurevi.com.tr', 'Huzurevi WEB')
            ->subject('İş Başvuru Formu')
            ->view('mails.insan-kaynaklari');
    }
}
