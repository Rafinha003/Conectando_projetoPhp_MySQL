<?php

include("conexao.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
 
    if(empty($nome) || empty($cpf) || empty($email)  || empty($telefone)){
      echo "Todos os campos são obrigatórios";
    }else{
 
        $submit = $mysqli->prepare("INSERT INTO cliente (nome, cpf, email, telefone) VALUES (?, ?, ?, ?)");
        $submit->bind_param("ssss", $nome, $cpf, $email, $telefone);
        
    }
 
     if($submit -> execute()){
         echo "Carro cadastrado com sucesso";
     }else{
         echo "Erro ao cadastrar o carro" . $submit -> error;
     }
 
     $submit -> close();  
 }


?>

<form method="POST" action="" style="border: 1px solid #ccc; padding: 20px; border-radius: 10px; background-color: #f9f9f9; max-width: 400px; margin: auto;">
    <h2 style="text-align: center; color: #333;">Cadastro de cliente</h2>
    <label for="nome" style="display: block; margin-bottom: 8px; color: #555;">Nome:</label>
    <input type="text" name="nome" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
    
    <label for="cpf" style="display: block; margin-bottom: 8px; color: #555;">Cpf:</label>
    <input type="text" name="cpf" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
    
    <label for="email" style="display: block; margin-bottom: 8px; color: #555;">Email:</label>
    <input type="text" name="email" style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">

    <label for="telefone" style="display: block; margin-bottom: 8px; color: #555;">Telefone:</label>
    <input type="text" name="telefone" style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">
    
    <input type="submit" value="Cadastrar" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
</form>

<hr style="margin: 20px auto; width: 80%; border: 1px solid #ccc;">

<form method="GET" action="listaCliente.php" style="text-align: center;">
    <input type="submit" value="Listar clientes cadastrados" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">
</form>

