<html>
  <head>
   <style>

      button {
        font-size: 20px;
        color: white;
        background-color: blue;
      }

      h1 {
        text-align: center;
        line-height: 1;
        height: 100px;
        color: lightgreen;
      }

      input,
      button {
        display: block;
        margin: 0 auto;
		font-size: 20px;
        color: white;
        background-color: olivedrab;
      }

      label {
        display: block;
        text-align: center;
        color: lightgreen;
        margin-bottom: 10px;
      }
	  
      body {
        background-color: #228B22;
      }
	  
	

    </style>
    <h1>Lista de Pacientes</h1>
  </head>
  <body>


<?php
include 'conecta.php';

// Consulta para obter os registros dos pacientes
$sql_listar_pacientes = "SELECT * FROM tb_paciente";
$result_listar_pacientes = $conn->query($sql_listar_pacientes);

if ($result_listar_pacientes->num_rows > 0) {
    echo "<table style='color: white;'>";
    echo "<tr><th>Código</th><th>Nome</th><th>CPF</th><th>RG</th></tr>";

    // Loop através dos registros dos pacientes
    while ($row = $result_listar_pacientes->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Codigo'] . "</td>";
        echo "<td>" . $row['Nome'] . "</td>";
        echo "<td>" . $row['CPF'] . "</td>";
        echo "<td>" . $row['RG'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Não há pacientes cadastrados.";
}

$conn->close();
?>



</body>
</html>
