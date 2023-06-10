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
    <h1>Lista de Médicos</h1>
  </head>
  <body>


<?php
include 'conecta.php';

// Consulta para obter os registros dos médicos
$sql_listar_medicos = "SELECT * FROM tb_medico";
$result_listar_medicos = $conn->query($sql_listar_medicos);

if ($result_listar_medicos->num_rows > 0) {
    echo "<table style='color: white;'>";
    echo "<tr><th>CRM</th><th>Nome</th><th>Salário</th><th>Data de Admissão</th><th>FormacaoID</th></tr>";

    // Loop através dos registros dos médicos
    while ($row = $result_listar_medicos->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['CRM'] . "</td>";
        echo "<td>" . $row['Nome'] . "</td>";
        echo "<td>" . $row['Salario'] . "</td>";
        echo "<td>" . $row['DataAdmissao'] . "</td>";
        echo "<td>" . $row['FormacaoID'] . "</td>";		
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Não há médicos cadastrados.";
}

$conn->close();
?>




</body>
</html>
