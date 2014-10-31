<?php
namespace Acme\StoreBundle;

class Mailer
{
    public function __construct($argument)
    {
        echo "This is constructor of mailer class with argument: {$argument}."."</br>";
    }

    public function send($email){
        echo "Mailer->send({$email}) invoked.<br />";
    }
}

?>