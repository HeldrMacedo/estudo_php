<?php
class PHPMailAdapter
{
    private $pm;
    public function __construct()
    {
        $this->pm = new PHPMailer(true);
        $this->pm->CharSet = 'UTF-8';
    }

    public function setFrom($from, $name)
    {
        $this->pm->From = $from;
        $this->pm->FromName = $name;
    }

    public function setSubject($subject)
    {
        $this->pm->Subject = $subject;
    }

    public function setTextBody($body)
    {
        $this->pm->Body = $body;
        $this->pm->isHTML(false);
    }

    public function addAddress($address, $name = '')
    {
        $this->pm->AddAddress($address, $name);
    }

    public function send()
    {
        $this->pm->Send();
    }
}