<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class CustomOrderSend extends Mailable
{
    use Queueable, SerializesModels;

    protected $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->msg = $msg;
        $this->date = Carbon::now();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ourfavoriteflowers@gmail.com', 'Our Flowers')->view('mail.custom_order')
                ->with([
                        'msg' => $this->msg, 
                        'date' => $this->date->toDateTimeString()
                ]); 
    }
}
