<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeNewUser extends Mailable{
    use Queueable, SerializesModels;
    public $TheUser;
    public function __construct($TheUser){
        $this->TheUser = $TheUser;
    }

    public function build(){
        return $this->markdown('mail/user/welcome-new-user')
                    ->subject('مرحباً بك في موقع Arte Online - تأكيد البريد الالكتروني');
    }
}
