<?php

if (isset($_POST["email"]) && isset($_POST["descricao"])) {

    // Conecta ao banco de dados
    $conexao = mysqli_connect("localhost", "root", "");
  
    // Seleciona o banco de dados
    mysqli_select_db($conexao, "formulario_contato");
  
    // Insere o registro no banco de dados
    $consulta = "INSERT INTO contatos (email, descricao) VALUES ('{$_POST["email"]}', '{$_POST["descricao"]}')";
    mysqli_query($conexao, $consulta);
  
    // Fecha a conexão
    mysqli_close($conexao);
  
    // Exibe uma mensagem de sucesso
    echo "Registro inserido com sucesso!";
  
  } else {
  
    // Exibe uma mensagem de erro
    echo "Erro ao inserir registro!";
  
  }

?>
