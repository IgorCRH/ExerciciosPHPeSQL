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
    <h1>Seção de Altas de Pacientes</h1>
  </head>
  <body>
    <form action="altapaciente.php" method="POST">
        <label for="salario">ID do Paciente:</label>
        <input type="text" name="PacienteID" required>
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

if (isset($_POST['PacienteID'])) {
$paciente_id = $_POST['PacienteID'];

    $sql_verifica_paciente = "SELECT * FROM tb_paciente WHERE Codigo = '$paciente_id'";
    $result_verifica_paciente = $conn->query($sql_verifica_paciente);

    if ($result_verifica_paciente->num_rows == 0) {
        echo "O paciente não foi encontrado na clínica.";
    } else {
        // Verifica se o paciente já está internado
        $sql_verifica_internacao = "SELECT * FROM tb_quarto_internacao WHERE PacienteID = '$paciente_id'";
        $result_verifica_internacao = $conn->query($sql_verifica_internacao);

        if ($result_verifica_internacao->num_rows > 0) {
            $sql_alta_paciente = "DELETE FROM tb_quarto_internacao WHERE PacienteID = '$paciente_id'";
if ($conn->query($sql_alta_paciente) === TRUE) {
    echo "Paciente recebeu alta.";
} else {
    echo "Erro ao dar alta ao paciente: " . $conn->error;
}
} else {		
    echo "O paciente não está internado.";
}
}
}

$conn->close();
?>



  </body>
</html>
