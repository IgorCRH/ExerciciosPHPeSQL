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
        color: white;
      }

      input,
      button {
        display: block;
        margin: 0 auto;
		font-size: 20px;
        color: white;
        background-color: maroon;
      }

      label {
        display: block;
        text-align: center;
        color: white;
        margin-bottom: 10px;
      }
	  
      body {
        background-color: #DC143C;
      }
	  
    </style>
    <h1>Lista de Funcionários</h1>
  </head>
  <body>
<?php
include 'conecta.php';

// Consulta todos os funcionários
$sql_funcionarios = "SELECT * FROM Funcionarios";
$result_funcionarios = $conn->query($sql_funcionarios);

if ($result_funcionarios->num_rows > 0) {
    echo "<table style='color: white;'>";
    echo "<tr><th>ID</th><th>CPF</th><th>Nome</th><th>Salário</th><th>Hora de Entrada</th><th>Hora de Saída</th></tr>";
    while ($row = $result_funcionarios->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='detalhes_funcionario.php?id=" . $row['ID'] . "'>" . $row['ID'] . "</a></td>";
        echo "<td>" . $row['CPF'] . "</td>";
        echo "<td>" . $row['Nome'] . "</td>";
        echo "<td>" . $row['Salario'] . "</td>";
        
        // Verifica se o funcionário é um guarda
        $sql_guarda = "SELECT * FROM Guardas WHERE FuncionarioID = " . $row['ID'];
        $result_guarda = $conn->query($sql_guarda);
        
        if ($result_guarda->num_rows > 0) {
            $guarda = $result_guarda->fetch_assoc();
            echo "<td>" . $guarda['HoraEntrada'] . "</td>";
            echo "<td>" . $guarda['HoraSaida'] . "</td>";
        } else {
            echo "<td>-</td>";
            echo "<td>-</td>";
        }
        
        echo "</tr>";
    }
    echo "</table>";
} else {
echo "Nenhum funcionário encontrado.";
}

$conn->close();
?>




</body>
</html>
