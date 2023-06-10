<html>
  <head>
   <style>
      #inserepaciente {
        text-align: center;
        top: 100px;
        font-size: 30px;
      }
	  
      #inserepacienteendereco {
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
    <h1>Inserção de Paciente</h1>
  </head>
  <body>
    <p style="color: rgb(152,251,152);" id="inserepaciente">Inserir Paciente</p>
    <form action="inserepaciente.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="Nome" required>
        <br>
        <label for="cpf">CPF:</label>
        <input type="text" name="CPF" required>
        <br>
		<label for="rg">RG:</label>
        <input type="text" name="RG" required>
        <br>
		<p style="color: rgb(152,251,152);" id="inserepacienteendereco">Endereço</p>
		<label for="rua">Rua:</label>
        <input type="text" name="Rua" required>
        <br>
		<label for="bairro">Bairro:</label>
        <input type="text" name="Bairro" required>
        <br>
		<label for="numero">Número:</label>
        <input type="text" name="Número" required>
        <br>		
		<label for="complemento">Complemento:</label>
        <input type="text" name="Complemento" required>
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

// Verifica se dentro do método POST os campos existem e tem algum valor
if (isset($_POST['Nome']) && isset($_POST['CPF']) && isset($_POST['RG']) && isset($_POST['Rua']) && isset($_POST['Bairro']) && isset($_POST['Número']) && isset($_POST['Complemento'])) {
    $nome = $_POST['Nome'];
    $cpf = $_POST['CPF'];
    $rg = $_POST['RG'];
    $rua = $_POST['Rua'];
    $bairro = $_POST['Bairro'];
    $numero = $_POST['Número'];
    $complemento = $_POST['Complemento'];

    // Insere os dados de endereço na tabela tb_endereco
    $sql_endereco = "INSERT INTO tb_endereco (Rua, Bairro, Numero, Complemento) VALUES ('$rua', '$bairro', '$numero', '$complemento')";
    if ($conn->query($sql_endereco) === TRUE) {
        $endereco_id = $conn->insert_id;

        // Insere os dados do paciente na tabela tb_paciente, vinculando ao endereço
        $sql_paciente = "INSERT INTO tb_paciente (Nome, CPF, RG, EnderecoID) VALUES ('$nome', '$cpf', '$rg', '$endereco_id')";
        if ($conn->query($sql_paciente) === TRUE) {
            echo "Paciente inserido com sucesso.";
        } else {
            echo "Erro ao inserir paciente: " . $conn->error;
        }
    } else {
        echo "Erro ao inserir endereço: " . $conn->error;
    }
}

$conn->close();
?>


  </body>
</html>
