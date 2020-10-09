<?php
require_once ('src/PHPMailer.php');
require_once ('src/SMTP.php');
require_once ('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = new PHPMailer(true);

try {

    $email->SMTPDebug = SMTP::DEBUG_SERVER;
    $email->isSMTP();
    $email->Host = 'smtp.gmail.com';
    $email->SMTPAuth = true;
    $email->Username = 'email para o envio';
    $email->Password = 'senha';
    $email->Port = 587;

    $email->setFrom('email para o envio');
    $email->addAddress('email recebedor');


    $email->isHTML(true);
    $email->Subject = 'Teste de email enviado, via GMAIL';
    $email->Body = 'Email enviado com sucesso com tags HTLM <strong>Teste strong</strong>';
    $email->AltBody = 'Chegando o email caso o html não esteja habilitado';

     if ($email->send()){
         echo "E-mail enviado com sucesso ::: entrou aqui";
     }else {
         echo "E-mail não enviado";
     }

}catch (Exception $e) {
    echo "Erro ao enviar mensagem {$email->ErrorInfo}";
}