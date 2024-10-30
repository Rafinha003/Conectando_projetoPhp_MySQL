<?php
include("conexao.php");

$sql = "SELECT nome, cpf, email, telefone FROM cliente"; 

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<h2 style='text-align: center; color: #333;'>LISTA DE CLIENTES CADASTRADOS</h2>";
    echo "<table style='width: 80%; margin: auto; border-collapse: collapse; border: 1px solid #ccc;'>";
    echo "<tr style='background-color: #4CAF50; color: white;'>";
    echo "<th style='padding: 10px;'>NOME</th>";
    echo "<th style='padding: 10px;'>CPF</th>";
    echo "<th style='padding: 10px;'>EMAIL</th>";
    echo "<th style='padding: 10px;'>TELEFONE</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr style='border-bottom: 1px solid #ddd;'>";
        echo "<td style='padding: 10px; text-align: center;'>" . htmlspecialchars($row["nome"]) . "</td>";
        echo "<td style='padding: 10px; text-align: center;'>" . htmlspecialchars($row["cpf"]) . "</td>";
        echo "<td style='padding: 10px; text-align: center;'>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td style='padding: 10px; text-align: center;'>" . htmlspecialchars($row["telefone"]) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<h2 style='text-align: center; color: #666;'>Nenhum carro cadastrado.</h2>";
}

$mysqli->close();
?>
