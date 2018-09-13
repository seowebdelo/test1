<?php
require_once 'form.php';

function swift ($orderMessage)
{
    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.yandex.ru', 465, 'ssl'))
        ->setUsername('burgersphp@yandex.ru')
        ->setPassword('burgersphp123')
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Данные по заказу'))
        ->setFrom(['burgersphp@yandex.ru' => 'burgersphp@yandex.ru'])
        ->setTo(['seo@webdelo.org' => 'A name'])
        ->setBody($orderMessage)
    ;

// Send the message
    $result = $mailer->send($message);
    print_r($result);
}