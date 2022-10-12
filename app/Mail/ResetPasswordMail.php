<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $email;
    protected $name;
    protected $code;
    protected $id;
    public function __construct($email, $id, $name, $code)
    {
        $this->email=$email;
        $this->name = $name;
        $this->code = $code;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email, 'Change password')->view('emails.reset_password')->with([
            'name' => $this->name,
            'code' => $this->code,
            'id' => $this->id
        ])->subject('Reset password');
    }
}
