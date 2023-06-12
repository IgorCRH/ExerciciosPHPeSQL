<html>
  <head>
   <style>
      #demitefunc {
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
    <h1>Demissão de Funcionário</h1>
  </head>
  <body>
    <p style="color: rgb(255,255,255);" id="demitefunc">Área de Dados para Demissão</p>
    <form action="demitefuncionario.php" method="POST">
        <label for="id">ID do Funcionário a ser Removido:</label>
        <input type="text" name="ID" required>
        <br>
        <input type="submit" value="Remover">
    </form>

<?php
include 'conecta.php';

if (isset($_POST['ID'])) {
    $funcionarios_id = $_POST['ID'];

    // Verificar se o funcionário existe
    $sql_verifica_func = "SELECT * FROM Funcionarios WHERE ID = '$funcionarios_id'";
    $result_verifica_func = $conn->query($sql_verifica_func);

    if ($result_verifica_func->num_rows == 0) {
        echo "O funcionário não foi encontrado.";
    } else {
        // Remover registros associados na tabela Guardas e Restauradores
        $sql_remover_guardas = "DELETE FROM Guardas WHERE FuncionarioID = '$funcionarios_id'";
        $result_remover_guardas = $conn->query($sql_remover_guardas);
		$sql_remover_restauradores = "DELETE FROM Restauradores WHERE FuncionarioID = '$funcionarios_id'";
		$result_remover_restauradores = $conn->query($sql_remover_restauradores);

        // Remover funcionário
        $sql_remover_func = "DELETE FROM Funcionarios WHERE ID = '$funcionarios_id'";
        $result_remover_func = $conn->query($sql_remover_func);

        if ($result_remover_func) {
            echo "Funcionário demitido e removido.";
        } else {
            echo "Erro ao remover o funcionário: " . $conn->error;
        }
    }
}

$conn->close();
?>

</body>
</html>
