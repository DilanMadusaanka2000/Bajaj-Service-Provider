<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderLink;

    /**
     * Create a new message instance.
     *
     * @param $order
     */
    public function __construct($order,  $orderLink)
    {
        //$formData['maintenance_services'] = implode(', ', $formData['maintenance_services']);
       // $order['order_placement'] = implode(',', $order['order_placement']);
        $this->order = $order;
        $this->orderLink = $orderLink;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->subject('Order Confirmation')
                    ->view('email.order_placed')
                    ->with([
                        'order' => $this->order,
                        'orderLink' => $this->orderLink
                    ]);
    }
}

