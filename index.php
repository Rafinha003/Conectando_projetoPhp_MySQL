<?php
include("conexao.php");
echo "Aula de conexão de banco de dados";

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $marca = $_POST["marca"];
   $modelo = $_POST["modelo"];
   $placa = $_POST["placa"];



   if(empty($marca) || empty($modelo) || empty($placa)){
     echo "Todos os campos são obrigatórios";
   }else{

    $submit = $mysqli->prepare("INSERT INTO carro (marca, modelo, palca) VALUES (?, ?, ?)");
    $submit -> bind_param("sss", $marca, $modelo, $placa);
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
    <h2 style="text-align: center; color: #333;">Cadastro de Carros</h2>
    <label for="marca" style="display: block; margin-bottom: 8px; color: #555;">Marca:</label>
    <input type="text" name="marca" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
    
    <label for="modelo" style="display: block; margin-bottom: 8px; color: #555;">Modelo:</label>
    <input type="text" name="modelo" style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
    
    <label for="placa" style="display: block; margin-bottom: 8px; color: #555;">Placa:</label>
    <input type="text" name="placa" style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">
    
    <input type="submit" value="Cadastrar" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
</form>

<hr style="margin: 20px auto; width: 80%; border: 1px solid #ccc;">

<form method="GET" action="lista.php" style="text-align: center;">
    <input type="submit" value="Listar Carros Cadastrados" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">
</form>
