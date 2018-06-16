<?php

namespace App\Jobs;

use App\Mail\CommentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendCommentMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    protected $comment;
    protected $product;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $comment, $product)
    {
        $this->user = $user;
        $this->comment = $comment;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new CommentMail($this->user,$this->comment,$this->product);

        Mail::to($this->user->email)->send($email);
    }
}
