<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user_name;
    private $email;
    private $title;
    private $audio;
    private $score;
    private $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->user_name = $inputs['user_name'];
        $this->email = $inputs['email'];
        $this->title = $inputs['title'];
        $this->audio = $inputs['audio'];
        $this->score = $inputs['score'];
        $this->body = $inputs['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('example@gmail.com')
            ->subject('自動送信メール')
            ->view('emails.mail')
            ->with([
                'user_name' => $this->user_name,
                'email' => $this->email,
                'title' => $this->title,
                'audio' => $this->audio,
                'score' => $this->score,
                'body'  => $this->body,
            ]);
    }
}
