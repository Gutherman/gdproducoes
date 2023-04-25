<?php

require_once 'enviar_email\lib\vendor\autoload.php'; // Atualize com o caminho absoluto para o diretório onde o arquivo autoload.php foi gerado pelo Composer

use enviar_email\lib\vendor\phpmailer\phpmailer\src\PHPMailer.php;
use enviar_email\lib\vendor\phpmailer\phpmailer\src\Exception.php;

require 'enviar_email\lib\vendor\phpmailer\phpmailer\src\Exception.php';
require 'enviar_email\lib\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'enviar_email\lib\vendor\phpmailer\phpmailer\src\SMTP.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    // Validar os campos do formulário
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo 'Por favor, preencha todos os campos do formulário.';
        exit;
    }

    // Instanciar o objeto PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor de e-mail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // substitua pelo endereço do servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'contatogdvideos@gmail.com'; // substitua pelo seu e-mail
        $mail->Password = 'Gm102030!'; // substitua pela sua senha
        $mail->SMTPSecure = 'tls'; // ou 'ssl' se necessário
        $mail->Port = 587; // ou outra porta utilizada pelo servidor SMTP

        // Configurações de envio de e-mail
        $mail->setFrom('contatogdvideos@gmail.com', 'E-mails do Site'); // substitua pelo seu e-mail e nome
        $mail->addAddress('contato@gdproducoes.com.br', 'Nome de cada cliente'); // substitua pelo e-mail e nome do destinatário
        $mail->Subject = 'Assunto do E-mail';
        $mail->Body = "Nome: $nome\nE-mail: $email\nMensagem: $mensagem";

        // Enviar o e-mail
        $mail->send();

        // Mensagem de confirmação
        echo 'Obrigado por enviar essa mensagem! Retornaremos o mais breve possível.';
    } catch (Exception $e) {
        echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
    }
}
?>
