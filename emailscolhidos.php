<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // Valida o formato do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido. Por favor, insira um e-mail válido.";
        exit; // Importante: inclua o exit para interromper a execução do código
    }

    // Salva os dados em um arquivo de texto (ou faz qualquer outra operação que você desejar)
    $dados = $nome . ":" . $email . "\n";
    file_put_contents("emailsnews.txt", $dados, FILE_APPEND);

    // Redireciona para o YouTube
    header("Location: https://www.youtube.com/@gd.producoes");
    exit; // Importante: inclua o exit para garantir que o redirecionamento seja executado corretamente
}
?>
