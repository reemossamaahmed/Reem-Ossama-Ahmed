<?php

namespace App\Mails;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Mail
{
    protected string $mailTo;
    protected string $subject;
    protected string $body;
    protected PHPMailer $mail;
    private $host = 'smtp.gmail.com';
    protected $mailFrom = 'NTImay2022@gmail.com';
    private $Password = '01004411210';

    public function __construct($mailTo, $subject, $body)
    {
        $this->mailTo = $mailTo;
        $this->subject = $subject;
        $this->body = $body;

        $this->mail = new PHPMailer(true);

        //Server settings
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = $this->host;                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = $this->mailFrom;                     //SMTP username
        $this->mail->Password   = $this->Password;                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = 465;
    }
}
