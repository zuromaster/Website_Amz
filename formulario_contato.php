<?php
// Cria uma conexão com o servidor MySQL
$conexao = mysqli_connect("localhost", "root", "");

// Cria um novo banco de dados
$consulta = "CREATE DATABASE formulario_contato";

if (mysqli_query($conexao, $consulta) === TRUE) {
    echo "Banco de dados criado com sucesso!";
} else {
    echo "Erro ao criar banco de dados: " . mysqli_error($conexao);
}

// Fecha a conexão
mysqli_close($conexao);






?>
