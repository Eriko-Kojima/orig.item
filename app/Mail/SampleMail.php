<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SampleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $menu;
    public $reservedatetime;
    public $detail;

    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct($name, $email, $id, $menu, $reservedatetime, $detail)
    {
        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
        $this->menu = $menu;
        $this->reservedatetime = $reservedatetime;
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->subject('ご予約確定いたしました')
            ->view('mail.sample')
            ->with([
                'name' => $this->name,
                'id' => $this->id,
                'menu' => $this->menu,
                'reservedatetime' => $this->reservedatetime,
                'detail' => $this->detail,
            ]);
    }
}
