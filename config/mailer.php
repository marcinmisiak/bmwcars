<?php
return [
'class' => 'yii\swiftmailer\Mailer',
// send all mails to a file by default. You have to set
// 'useFileTransport' to false and configure a transport
// for the mailer to send real emails.
'useFileTransport' => false,
'transport' => [
		'class' => 'Swift_SmtpTransport',
		'host' => 'bmw-zkmotors.pl',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
		'username' => 'uzytk',
		'password' => 'haslo',
		'port' => '587', // Port 25 is a very common port too
		'encryption' => 'tls', // It is often used, check your provider or mail server specs
],
];