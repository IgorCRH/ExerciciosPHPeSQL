<?php
$servername = "nomedohost";
$username = "nomedousuario";
$password = "";
$dbname = "clinica";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
