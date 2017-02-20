<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name = 'dima';
    public $msg = 'hi my dear Olga';


    public function __construct($name, $msg)
    {
        $this->name = $name;
        $this->msg = $msg;
    }

    public function build()
    {
        return $this->from('dima@gmail.com')
                    ->view('emails.bodyEmail');
    }
}
