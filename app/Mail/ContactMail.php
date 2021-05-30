<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('письмо с сайта СНТ НАРА')->
        from('mail.sntnara@gmail.com')->view('emails.dynamic_email_template')->with('data', [$this->data]);
    }
}
