<?php
// processa_login.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Conectar ao banco de dados
    $conn = new mysqli("localhost", "root", "", "cadastro_login_db");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Consulta para verificar as credenciais
    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verificar se o usuário existe e a senha está correta
    if ($user && password_verify($senha, $user["senha"])) {
        // Login bem-sucedido, redirecionar para outra página
        header("Location: download.php");
        exit();
    } else {
        echo "Credenciais inválidas. Tente novamente.";
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}
?>
