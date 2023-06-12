<html>
  <head>
   <style>
      button {
        font-size: 20px;
        color: white;
        background-color: blue;
      }

      h1, h2 {
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
	  
	  .infofunc {
    color: white;
}
	  
    </style>
    <h1>Informações dos Funcionários</h1>
  </head>
  <body>
  
<?php
include 'conecta.php';

if (isset($_GET['id'])) {
    $funcionario_id = $_GET['id'];
    
    // Consulta o funcionário pelo ID
    $sql_funcionario = "SELECT * FROM Funcionarios WHERE ID = '$funcionario_id'";
    $result_funcionario = $conn->query($sql_funcionario);
    
    if ($result_funcionario->num_rows > 0) {
        $funcionario = $result_funcionario->fetch_assoc();
        
        echo "<h1>Detalhes do Funcionário</h1>";
        echo "<p class='infofunc'>ID: " . $funcionario['ID'] . "</p>";
        echo "<p class='infofunc'>CPF: " . $funcionario['CPF'] . "</p>";
        echo "<p class='infofunc'>Nome: " . $funcionario['Nome'] . "</p>";
        echo "<p class='infofunc'>Salário: " . $funcionario['Salario'] . "</p>";
        
        // Verifica se o funcionário é um guarda
        $sql_guarda = "SELECT * FROM Guardas WHERE FuncionarioID = '$funcionario_id'";
        $result_guarda = $conn->query($sql_guarda);
        
        if ($result_guarda->num_rows > 0) {
            $guarda = $result_guarda->fetch_assoc();
            echo "<h2>Detalhes do Guarda</h2>";
            echo "<p class='infofunc'>Hora de Entrada: " . $guarda['HoraEntrada'] . "</p>";
            echo "<p class='infofunc'>Hora de Saída: " . $guarda['HoraSaida'] . "</p>";
        }
        
        // Verifica se o funcionário é um restaurador
        $sql_restaurador = "SELECT * FROM Restauradores WHERE FuncionarioID = '$funcionario_id'";
        $result_restaurador = $conn->query($sql_restaurador);
        
        if ($result_restaurador->num_rows > 0) {
            $restaurador = $result_restaurador->fetch_assoc();
            echo "<h2>Detalhes do Restaurador</h2>";
            echo "<p>Especialidade: " . $restaurador['Especialidade'] . "</p>";
        }
    } else {
        echo "Funcionário não encontrado.";
    }
} else {
    echo "ID do funcionário não especificado.";
}

$conn->close();
?>





</body>
</html>
