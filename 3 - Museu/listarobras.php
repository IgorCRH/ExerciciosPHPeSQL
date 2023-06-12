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
    <h1>Lista das Obras</h1>
  </head>
  <body>
  
<?php
include 'conecta.php';

// Consulta todas as obras
$sql_obras = "SELECT * FROM Obra";
$result_obras = $conn->query($sql_obras);

if ($result_obras->num_rows > 0) {
    echo "<table style='color: white;'>";
    echo "<tr><th>Código</th><th>Título</th><th>Ano</th><th>Salão</th><th>Autor</th></tr>";
    while ($row = $result_obras->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Codigo'] . "</td>";
        echo "<td>" . $row['Titulo'] . "</td>";
        echo "<td>" . $row['Ano'] . "</td>";
        
        // Verifica se há um salão associado à obra
        if ($row['SalaoNumero'] != NULL) {
            echo "<td><a href='detalhes_salao.php?numero=" . $row['SalaoNumero'] . "'>" . $row['SalaoNumero'] . "</a></td>";
        } else {
            echo "<td>-</td>";
        }
        
        // Verifica se há um autor associado à obra
        if ($row['AutorCodigo'] != NULL) {
            echo "<td><a href='detalhes_autor.php?codigo=" . $row['AutorCodigo'] . "'>" . $row['AutorCodigo'] . "</a></td>";
        } else {
            echo "<td>-</td>";
        }
        
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhuma obra encontrada.";
}

$conn->close();
?>







</body>
</html>
