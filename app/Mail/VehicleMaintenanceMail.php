<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VehicleMaintenanceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    /**
     * Create a new message instance.
     */
    public function __construct($formData)
    {
        $formData['maintenance_services'] = implode(', ', $formData['maintenance_services']);
        $this->formData = $formData;
    }

    /**
     * Build the message.
     */
    public function build()
    {
         return $this->view('emails.vehicle_maintenance')
            ->subject('Vehicle Maintenance Request Confirmation')
            ->with(['formData' => $this->formData])
            ->attach(public_path('img/bajaj.png'), [
                'as' => 'maintenance_image.jpg',
                'mime' => 'image/jpeg',
                'cid' => 'maintenance_image', // unique identifier
            ]);

       // return $this->view('mail1.hello');
    }
}
