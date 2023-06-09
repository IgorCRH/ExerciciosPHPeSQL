<?php
$servername = "localhost";
$username = "nomedousuario";
$password = "";
$dbname = "almoxarifado";

// Criando a conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificando a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
