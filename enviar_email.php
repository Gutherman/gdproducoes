<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Verifica se o formulário foi submetido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assunto = $_POST["assunto"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $contatoAnterior = $_POST["contatoAnterior"];
    $mensagem = $_POST["mensagem"];

    try {
        // Configuração do servidor SMTP do Gmail
        $smtpServer = 'smtp.gmail.com';
        $smtpPort = 587;
        $smtpUsuario = 'contatogdvideos@gmail.com';
        $smtpSenha = 'Gm102030!';

        // Cria uma nova instância do PHPMailer
        $mail = new PHPMailer(true);

        // Configura o servidor SMTP
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // Altere para SMTP::DEBUG_SERVER para exibir mensagens de debug detalhadas
        $mail->Host = $smtpServer;
        $mail->Port = $smtpPort;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use PHPMailer::ENCRYPTION_SMTPS se o servidor SMTP requerer SSL
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsuario;
        $mail->Password = $smtpSenha;

        // Cabeçalhos do email
        $mail->setFrom($email, $nome);
        $mail->addReplyTo($email);
        $mail->addAddress('contato@gdproducoes.com.br'); // Endereço de email do destinatário
        $mail->CharSet = 'UTF-8';

        // Corpo do email
        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body = "<p><strong>Assunto:</strong> " . $assunto . "</p>";
        $mail->Body .= "<p><strong>Nome:</strong> " . $nome . "</p>";
        $mail->Body .= "<p><strong>Email:</strong> " . $email . "</p>";
        $mail->Body .= "<p><strong>Telefone:</strong> " . $telefone . "</p>";
        $mail->Body .= "<p><strong>Contato Anterior na GD Produções:</strong> " . $contatoAnterior . "</p>";
        $mail->Body .= "<p><strong>Mensagem:</strong> " . $mensagem . "</p>";
                
        // Anexos do email (opcional)
        // $mail->addAttachment('/caminho/para/arquivo1.pdf', 'nome_do_arquivo1.pdf');
        // $mail->addAttachment('/caminho/para/arquivo2.pdf', 'nome_do_arquivo2.pdf');
        
         // Tenta enviar o email
        if ($mail->send()) {
        echo "Mensagem enviada com sucesso!";
        } else {
        echo "Ocorreu um erro ao enviar a mensagem: " . $mail->ErrorInfo;
}
    } catch (Exception $e) {
        // Redireciona para a página inicial após 3 segundos
        header("refresh:3;url=index.php"); // Substitua "index.php" pelo nome da sua página inicial
        exit;
    }
}
?>