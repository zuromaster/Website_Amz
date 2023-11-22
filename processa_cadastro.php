<?php
// processa_cadastro.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    // Conectar ao banco de dados
    $conn = new mysqli("localhost", "root", "", "cadastro_login_db");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Inserir um novo usuário
    $sql_insert_user = "INSERT INTO `usuarios` (`nome`, `email`, `senha`) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql_insert_user);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        echo "Cadastro bem-sucedido. Faça login <a href='login.html'>aqui</a>.";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}
?>
