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
    <h1>Informações dos Autores</h1>
  </head>
  <body>
<?php
include 'conecta.php';

if (isset($_GET['codigo'])) {
    $autor_codigo = $_GET['codigo'];
    
    // Consulta o autor pelo código
    $sql_autor = "SELECT * FROM Autor WHERE Codigo = '$autor_codigo'";
    $result_autor = $conn->query($sql_autor);
    
    if ($result_autor->num_rows > 0) {
        $autor = $result_autor->fetch_assoc();
        
        echo "<h1>Detalhes do Autor</h1>";
        echo "<p class='infofunc'>Código: " . $autor['Codigo'] . "</p>";
        echo "<p class='infofunc'>Nome: " . $autor['Nome'] . "</p>";
        echo "<p class='infofunc'>Nacionalidade: " . $autor['Nacionalidade'] . "</p>";
    // Consulta as obras do autor
    $sql_obras = "SELECT * FROM Obra WHERE AutorCodigo = '$autor_codigo'";
    $result_obras = $conn->query($sql_obras);

    if ($result_obras->num_rows > 0) {
        echo "<h2>Obras do Autor</h2>";
        echo "<table style='color: white;'>";
        echo "<tr><th>Código</th><th>Título</th><th>Ano</th><th>Salão</th></tr>";

        while ($obra = $result_obras->fetch_assoc()) {
            echo "<tr>";
            echo "<td><a href='detalhes_obra.php?codigo=" . $obra['Codigo'] . "'>" . $obra['Codigo'] . "</a></td>";
            echo "<td>" . $obra['Titulo'] . "</td>";
            echo "<td>" . $obra['Ano'] . "</td>";
            echo "<td><a href='detalhes_salao.php?numero=" . $obra['SalaoNumero'] . "'>" . $obra['SalaoNumero'] . "</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Não há obras associadas a este autor.";
    }
} else {
    echo "Autor não encontrado.";
}
} else {
echo "Código do autor não especificado.";
}

$conn->close();
?>  

</body>
</html>
