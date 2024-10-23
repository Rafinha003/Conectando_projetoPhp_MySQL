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
   $mysqli -> close();
?>

<form method="POST" action="">
    Marca: <input type="text" name="marca"><br>
    Modelo: <input type="text" name="modelo"><br>
    Placa: <input type="text" name="placa"><br>
    <input type="submit" value="cadastrar">
</form>