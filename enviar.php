<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Coleta os dados do formulário
    $nome = strip_tags(trim($_SERVER["nome"]));
    $assunto = strip_tags(trim($_POST["assunto"]));
    $mensagem = strip_tags(trim($_POST["mensagem"]));

    // 2. Configurações do e-mail
    $destinatario = "paulodallas63@gmail.com"; // <-- ONDE VOCÊ QUER RECEBER
    $titulo = "Novo Contato MYBOX: $assunto";
    
    // 3. Monta o corpo do e-mail
    $corpo = "Nome: $nome\n";
    $corpo .= "Assunto: $assunto\n\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    // 4. Cabeçalhos (Headers) - Importante para o e-mail não ser bloqueado
    $headers = "From: contato@seusite.com" . "\r\n" .
               "Reply-To: $destinatario" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // 5. Envia o e-mail
    if (mail($destinatario, $titulo, $corpo, $headers)) {
        echo "✅ Mensagem enviada com sucesso!";
    } else {
        echo "❌ Erro ao enviar a mensagem.";
    }
} else {
    echo "Acesso negado.";
}
?>
