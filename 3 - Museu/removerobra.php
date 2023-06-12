<html>
  <head>
   <style>
      #removeobra {
        text-align: center;
        top: 100px;
        font-size: 30px;
      }

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
    <h1>Remoção de Obra</h1>
  </head>
  <body>
    <p style="color: rgb(255,255,255);" id="removeobra">Área de Dados para Remoção</p>
    <form action="removerobra.php" method="POST">
        <label for="codigo">Código da Obra a ser Removida:</label>
        <input type="text" name="Codigo" required>
        <br>
        <input type="submit" value="Remover">
    </form>

<?php
include 'conecta.php';

if (isset($_POST['Codigo'])) {
    $obra_codigo = $_POST['Codigo'];

    // Verificar se a obra existe
    $sql_verifica_obra = "SELECT * FROM Obra WHERE Codigo = '$obra_codigo'";
    $result_verifica_obra = $conn->query($sql_verifica_obra);

    if ($result_verifica_obra->num_rows == 0) {
        echo "A obra não foi encontrada.";
    } else {
        // Remover registros associados na tabela Escultura
        $sql_remover_escultura = "DELETE FROM Escultura WHERE ObraCodigo = '$obra_codigo'";
        $result_remover_escultura = $conn->query($sql_remover_escultura);
		$sql_remover_pintura = "DELETE FROM Pintura WHERE ObraCodigo = '$obra_codigo'";
		$result_remover_pintura = $conn->query($sql_remover_pintura);

        // Remover a obra
        $sql_remover_obra = "DELETE FROM Obra WHERE Codigo = '$obra_codigo'";
        $result_remover_obra = $conn->query($sql_remover_obra);

        if ($result_remover_obra) {
            echo "Obra removida com sucesso.";
        } else {
            echo "Erro ao remover a obra: " . $conn->error;
        }
    }
}

$conn->close();
?>

</body>
</html>
