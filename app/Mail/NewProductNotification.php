<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProductNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $productName;

    /**
     * Create a new message instance.
     *
     * @param  string  $productName
     * @return void
     */
    public function __construct($productName)
    {
        $this->productName = $productName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Product Notification') // Chủ đề email
                    ->html("<p>New product available: {$this->productName}</p>"); // Nội dung email với tên sản phẩm mới
    }
}