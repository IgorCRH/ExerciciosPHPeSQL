<html>
  <head>
   <style>
      #alterapaciente {
        text-align: center;
        top: 100px;
        font-size: 30px;
      }
	  
      #alterapacienteendereco {
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
    <h1>Alteração de Paciente</h1>
  </head>
  <body>
    <p style="color: rgb(152,251,152);" id="alterapaciente">Alterar Paciente</p>
    <form action="alterapaciente.php" method="POST">
        <label for="codigo">Código do Paciente:</label>
        <input type="text" name="Codigo" required>
        <br>
        <label for="nome">Nome:</label>
        <input type="text" name="Nome" required>
        <br>
        <label for="cpf">CPF:</label>
        <input type="text" name="CPF" required>
        <br>
		<label for="rg">RG:</label>
        <input type="text" name="RG" required>
        <br>
		<p style="color: rgb(152,251,152);" id="alterapacienteendereco">Endereço</p>
		<label for="rua">Rua:</label>
        <input type="text" name="Rua" required>
        <br>
		<label for="bairro">Bairro:</label>
        <input type="text" name="Bairro" required>
        <br>
		<label for="numero">Número:</label>
        <input type="text" name="Numero" required>
        <br>		
		<label for="complemento">Complemento:</label>
        <input type="text" name="Complemento" required>
        <br>
        <input type="submit" value="Alterar">
    </form>

<?php
include 'conecta.php';

// Verifica se dentro do método POST o campo Codigo existe e tem algum valor
if (isset($_POST['Codigo'])) {
    $codigo = $_POST['Codigo'];
    $nome = $_POST['Nome'];
    $cpf = $_POST['CPF'];
    $rg = $_POST['RG'];
    $rua = $_POST['Rua'];
    $bairro = $_POST['Bairro'];
    $numero = $_POST['Numero'];
    $complemento = $_POST['Complemento'];

    // Atualiza os dados do paciente
    $sql_update_paciente = "UPDATE tb_paciente SET Nome = '$nome', CPF = '$cpf', RG = '$rg' WHERE Codigo = $codigo";
     if ($conn->query($sql_update_paciente) === TRUE) {
        // Obtém o ID do endereço vinculado ao paciente
        $sql_obter_endereco_id = "SELECT EnderecoID FROM tb_paciente WHERE Codigo = $codigo";
        $result_obter_endereco_id = $conn->query($sql_obter_endereco_id);

        if ($result_obter_endereco_id->num_rows > 0) {
            $row_endereco_id = $result_obter_endereco_id->fetch_assoc();
            $enderecoID = $row_endereco_id['EnderecoID'];

            // Atualiza os dados do endereço
            $sql_update_endereco = "UPDATE tb_endereco SET Rua = '$rua', Bairro = '$bairro', Numero = '$numero', Complemento = '$complemento' WHERE ID = $enderecoID";
            if ($conn->query($sql_update_endereco) === TRUE) {
                echo "Paciente e endereço atualizados com sucesso.";
            } else {
                echo "Erro ao atualizar endereço: " . $conn->error;
            }
        } else {
            echo "Erro ao obter ID do endereço.";
        }
    } else {
        echo "Erro ao atualizar paciente: " . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>

