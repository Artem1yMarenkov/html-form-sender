<?php

interface send_email {
    public function send_message();
}

class Mailer implements send_email {
    private $name;
    private $message;
    private $phone_number;
    private $post_message;


    public function send_message() : void
    {
        $this->set_user_info();
        $this->send_to_mail();
    }


    private function set_user_info() : void
    {
        $this->name         = trim(htmlspecialchars(urldecode($_POST['name'])));
        $this->phone_number = trim(htmlspecialchars(urldecode($_POST['phone_number'])));
        $this->message      = trim(htmlspecialchars(urldecode($_POST['message'])));

        $this->post_message = (
            "New message from your site: <br>".
            "Name: $this->name <br>".
            "Phone number: $this->phone_number <br>".
            "Message: $this->message <br>"
        );
    }


    private function send_to_mail() : void
    {
        mail ( 
            $to      = "<YOUR EMAIL>",
            $subject = "Message from your site",
            $message = "$this->post_message"
        );
    }

}

$Mailer = new Mailer;
$Mailer->send_message();

?>