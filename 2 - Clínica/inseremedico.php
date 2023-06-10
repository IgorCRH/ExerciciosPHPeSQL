<html>
  <head>
   <style>
      #inseremedico {
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
    <h1>Inserção de Médico</h1>
  </head>
  <body>
    <p style="color: rgb(152,251,152);" id="inseremedico">Inserir Médico</p>
    <form action="inseremedico.php" method="POST">
	     <label for="nome">CRM:</label>
        <input type="text" name="CRM" required>
        <br>
        <label for="nome">Nome:</label>
        <input type="text" name="Nome" required>
        <br>
        <label for="salario">Salário:</label>
        <input type="text" name="Salario" required>
        <br>
		<label for="datadeadmissao">Data de Admissão:</label>
        <input type="text" name="DatadeAdmissao" required>
        <br>
		<label for="indicedaatuacao">Índice da Formação de Atuação:</label>
        <input type="text" name="IndicedaAtuacao" required>
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

// Verifica se dentro do método POST os campos existem e tem algum valor
if (isset($_POST['CRM']) && isset($_POST['Nome']) && isset($_POST['Salario']) && isset($_POST['DatadeAdmissao']) && isset($_POST['IndicedaAtuacao'])) {
$crm = $_POST['CRM'];
$nome = $_POST['Nome'];
$salario = $_POST['Salario'];
$data_admissao = $_POST['DatadeAdmissao'];
$formacao_id = $_POST['IndicedaAtuacao'];


    $sql_verifica_formacao_id = "SELECT * FROM tb_formacao WHERE IDFormacao = '$formacao_id'";
    $result_verifica_formacao_id = $conn->query($sql_verifica_formacao_id);

    if ($result_verifica_formacao_id->num_rows == 0) {
        echo "Atuação não encontrada.";
    } else {
    // Insere os dados de endereço na tabela tb_endereco
$sql_medico = "INSERT INTO tb_medico (CRM, Nome, Salario, DataAdmissao, FormacaoID) VALUES ('$crm', '$nome', '$salario', '$data_admissao', '$formacao_id')";
if ($conn->query($sql_medico) === TRUE) {
      echo "Médico inserido com sucesso.";
        } else {
            echo "Erro ao inserir médico: " . $conn->error;
        }
	}

$conn->close();
}
?>

  </body>
</html>
