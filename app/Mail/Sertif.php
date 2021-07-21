<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sertif extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event, $name, $sertif_name)
    {
        $this->event = $event;
        $this->name = $name;
        $this->sertif_name = $sertif_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $event = $this->event;
        $name = $this->name;
        $sertif_name = $this->sertif_name;
        return $this->view('emails.sertif',compact('event','name'))
                    -> subject('Sertifikat '.$event->name.' '.$name)
                    ->attach('sertif/'.$event->name.'/'.$sertif_name);
    }
}
