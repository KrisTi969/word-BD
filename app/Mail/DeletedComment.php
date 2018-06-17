<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeletedComment extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $product;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.comment-disable')->with(['user'=>$this->user])->with(['product'=>$this->product]);
    }
}
