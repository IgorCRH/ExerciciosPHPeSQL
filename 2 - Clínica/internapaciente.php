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
    <h1>Cadastro de Internações</h1>
  </head>
  <body>
    <form action="internapaciente.php" method="POST">
	     <label for="nome">Andar do Quarto:</label>
        <input type="text" name="AndarQuarto" required>
        <br>
        <label for="nome">Numero do Quarto:</label>
        <input type="text" name="NumeroQuarto" required>
        <br>
        <label for="salario">ID do Paciente:</label>
        <input type="text" name="PacienteID" required>
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

if (isset($_POST['PacienteID']) && isset($_POST['NumeroQuarto']) && isset($_POST['AndarQuarto'])) {
    $paciente_id = $_POST['PacienteID'];
    $numero = $_POST['NumeroQuarto'];
    $andar = $_POST['AndarQuarto'];

    // Verifica se o paciente existe na clínica
    $sql_verifica_paciente = "SELECT * FROM tb_paciente WHERE Codigo = '$paciente_id'";
    $result_verifica_paciente = $conn->query($sql_verifica_paciente);

    if ($result_verifica_paciente->num_rows == 0) {
        echo "O paciente não foi encontrado na clínica.";
    } else {
        // Verifica se o paciente já está internado
        $sql_verifica_internacao = "SELECT * FROM tb_quarto_internacao WHERE PacienteID = '$paciente_id'";
        $result_verifica_internacao = $conn->query($sql_verifica_internacao);

        if ($result_verifica_internacao->num_rows > 0) {
            echo "O paciente já está internado.";
        } else {
            // Insere o paciente na tabela tb_quarto_internacao
            $sql_interna_paciente = "INSERT INTO tb_quarto_internacao (PacienteID, Numero, Andar) VALUES ('$paciente_id', '$numero', '$andar')";
            if ($conn->query($sql_interna_paciente) === TRUE) {
                echo "Paciente internado com sucesso.";
            } else {
                echo "Erro ao internar paciente: " . $conn->error;
            }
        }
    }
}

$conn->close();
?>


  </body>
</html>
