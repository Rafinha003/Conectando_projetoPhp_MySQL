<?php
$hostName = "localhost";
$nomeBancoDados = "localiza";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostName, $usuario, $senha, $nomeBancoDados);

if ($mysqli->connect_error) {
    echo "Falha na conexão no banco de dados:(" .$mysqli->connect_error .") "  .$mysqli->connect_error ;
}else{
    echo "Banco de dados conectado com sucesso";
}