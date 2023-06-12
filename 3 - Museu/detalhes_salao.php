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
    <h1>Informações dos Salões</h1>
  </head>
  <body>
  

<?php
include 'conecta.php';

if (isset($_GET['numero'])) {
    $salao_numero = $_GET['numero'];
    
    // Consulta o salão pelo número
    $sql_salao = "SELECT * FROM Salao WHERE Numero = '$salao_numero'";
    $result_salao = $conn->query($sql_salao);
    
    if ($result_salao->num_rows > 0) {
        $salao = $result_salao->fetch_assoc();
        
        echo "<h1>Detalhes do Salão</h1>";
        echo "<p>Número: " . $salao['Numero'] . "</p>";
        echo "<p>Andar: " . $salao['Andar'] . "</p>";
        
        // Consulta as obras no salão
        $sql_obras = "SELECT * FROM Obra WHERE SalaoNumero = '$salao_numero'";
        $result_obras = $conn->query($sql_obras);
        
        if ($result_obras->num_rows > 0) {
            echo "<h2>Obras no Salão</h2>";
            echo "<table>";
            echo "<tr><th>Código</th><th>Título</th><th>Ano</th></tr>";
            
            while ($obra = $result_obras->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='detalhes_obra.php?codigo=" . $obra['Codigo'] . "'>" . $obra['Codigo'] . "</a></td>";
                echo "<td>" . $obra['Titulo'] . "</td>";
                echo "<td>" . $obra['Ano'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "Não há obras neste salão.";
        }
    } else {
        echo "Salão não encontrado.";
    }
} else {
    echo "Número do salão não especificado.";
}

$conn->close();
?>

</body>
</html>
