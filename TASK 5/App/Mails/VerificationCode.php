<?php

namespace App\Mails;

use App\Mails\Mail;

class VerificationCode extends Mail
{
    public function send()
    {
        try {
            //Recipients
            $this->mail->setFrom($this->mailFrom, 'Ecommerce');
            $this->mail->addAddress($this->mailTo);     //Add a recipient

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body;

            if ($this->mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            echo "<div class ='alert alert-danger'>Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}</div>";
        }
    }
}
