<?php

namespace App\Http\Controllers;

use Illuminate\Mail\Mailable;

class ReqMail extends Mailable
{
    public $data;
    /*
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this -> data = $data;
    }

    /*
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $requestData = $this->data;
        $text = '';
        foreach($requestData as $reqData) {
            $text .= $reqData.' <br> ';
        }
        return $this->from('notify@umax.agency','UMAX REPORTS')->subject('Сообщение с сайта UMAX REPORTS')->html($text);
    }
}