<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();


if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'status' => 'false',
        'mensagem' => 'Ops, Email informado esta com o formato errado!'
    ]);
    die;
}


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('fzzmarlon@gmail.com', 'Contato Email');     //Add a recipient
    $mail->addAddress($_POST['email'], $_POST['nome']);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Enviando email de teste';
    $mail->Body    = "Olá <b>{$_POST['nome']}</b>, recebemos o seu contato com sucesso em breve iremos entrar em contato";
    $mail->Body    .= "<br><br>Dados informados para o seu contato:";
    $mail->Body    .= "<br>Nome: <b>{$_POST['nome']}</b>";
    $mail->Body    .= "<br>Telefone: <b>{$_POST['telefone']}</b>";
    $mail->Body    .= "<br>Cpf: <b>{$_POST['cpf']}</b>";
    $mail->Body    .= "<br>Descrição: <b>{$_POST['descricao']}</b>";

    if ($mail->send()) {
        ob_clean();
        echo json_encode([
            'status' => 'true',
            'mensagem' => 'Contato enviado com sucesso'
        ]);
    } else {
        echo json_encode([
            'status' => 'false',
            'mensagem' => 'Ops não conseguimos enviar o seu contato'
        ]);
    }

} catch (Exception $e) {
    echo json_encode([
        'status' => 'false',
        'mensagem' => 'Ops não conseguimos enviar o seu contato'
    ]);

}

