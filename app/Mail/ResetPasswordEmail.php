<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $ho_ten;
    public $resetLink;

    /**
     * Create a new message instance.
     *
     * @param string $ho_ten
     * @param string $resetLink
     * @return void
     */
    public function __construct($ho_ten, $resetLink)
    {
        $this->ho_ten = $ho_ten;  // Lưu tên người dùng
        $this->resetLink = $resetLink;  // Lưu URL reset mật khẩu
    }

    /**
     * Build the message.
     *
     * @return \Illuminate\Contracts\Mail\Mailable
     */
    public function build()
    {
        return $this->view('auth.reset_password')  // Sử dụng view của bạn
                    ->with([
                        'ho_ten' => $this->ho_ten,  // Truyền tên người dùng vào view
                        'resetLink' => $this->resetLink,  // Truyền link vào view
                    ])
                    ->subject('Password Reset Link');
    }
}
