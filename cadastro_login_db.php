<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro_login_db";

// Dados do novo usuário
$novo_nome = 'Novo Usuário';
$novo_email = 'novo@email.com';
$nova_senha = password_hash('nova_senha', PASSWORD_DEFAULT);

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Insere um novo usuário
$sql_insert_user = "INSERT INTO `usuarios` (`nome`, `email`, `senha`) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql_insert_user);
$stmt->bind_param("sss", $novo_nome, $novo_email, $nova_senha);

if ($stmt->execute()) {
    echo "Novo usuário inserido com sucesso<br>";
} else {
    echo "Erro ao inserir novo usuário: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
