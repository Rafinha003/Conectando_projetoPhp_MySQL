<?php
include("conexao.php");

$sql = "SELECT marca, modelo, palca FROM carro"; 

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<h2 style='text-align: center; color: #333;'>LISTA DE CARROS CADASTRADOS</h2>";
    echo "<table style='width: 80%; margin: auto; border-collapse: collapse; border: 1px solid #ccc;'>";
    echo "<tr style='background-color: #4CAF50; color: white;'>";
    echo "<th style='padding: 10px;'>MARCA</th>";
    echo "<th style='padding: 10px;'>MODELO</th>";
    echo "<th style='padding: 10px;'>PLACA</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr style='border-bottom: 1px solid #ddd;'>";
        echo "<td style='padding: 10px; text-align: center;'>" . htmlspecialchars($row["marca"]) . "</td>";
        echo "<td style='padding: 10px; text-align: center;'>" . htmlspecialchars($row["modelo"]) . "</td>";
        echo "<td style='padding: 10px; text-align: center;'>" . htmlspecialchars($row["palca"]) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<h2 style='text-align: center; color: #666;'>Nenhum carro cadastrado.</h2>";
}

$mysqli->close();
?>
