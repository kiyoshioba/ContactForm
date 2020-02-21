<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    // コンタクトフォームのインスタンス
    private $user_name;
    private $email;
    private $title;
    private $file;
    private $score;
    private $body;

    /**
     * Create a new message instance.
     *
     * @param Contact $contact
     */
    public function __construct($inputs)
    {
        $this->user_name = $inputs['user_name'];
        $this->email = $inputs['email'];
        $this->title = $inputs['title'];
        $this->file = $inputs['file'];
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
                'file' => $this->file,
                'score' => $this->score,
                'body'  => $this->body,
            ]);
            // ->attach(storage_path(''));;
    }
}