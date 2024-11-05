<?php
  include("conexao.php");

  // Query para contar o número total de carros
  $sql = "SELECT COUNT(*) as total FROM carro";
  $result = $mysqli->query($sql);

  // Verificando se o resultado contém dados e pegando o valor
  $total_carro = ($result->num_rows > 0) ? $result->fetch_assoc()['total'] : 0;

  // Fechando a conexão com o banco de dados
  $mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Carros</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Gráfico de Carros Cadastrados</h2>
    
    <!-- Elemento para renderizar o gráfico -->
    <canvas id="carroChart" width="400" height="200"></canvas>

    <!-- Script para gerar o gráfico -->
    <script>
        // Passando o valor de $total_carro para a variável JavaScript
        var totalCarros = <?php echo $total_carro; ?>;

        // Pegando o contexto do canvas
        var ctx = document.getElementById('carroChart').getContext('2d');

        // Criando o gráfico
        var carroChart = new Chart(ctx, {
            type: 'bar',  
            data: {
                labels: ['Carros Cadastrados'], 
                datasets: [{
                    label: 'Quantidade de Carros',
                    data: [totalCarros],  
                }]
            },
            options: {
                responsive: true, 
                scales: {
                    y: {
                        beginAtZero: true 
                    }
                }
            }
        });
    </script>
</body>
</html>
