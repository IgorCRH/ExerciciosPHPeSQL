<html>
  <head>
   <style>
      #insereformacao {
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
    <h1>Inserção de Formações dos Médicos</h1>
  </head>
  <body>
    <form action="insereformacao.php" method="POST">
	     <label for="nome">Especialização:</label>
        <input type="text" name="Especializacao" required>
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

// Verifica se dentro do método POST os campos existem e tem algum valor
if (isset($_POST['Especializacao'])) {
$especializacao = $_POST['Especializacao'];


    // Insere os dados de endereço na tabela tb_endereco
$sql_formacao = "INSERT INTO tb_formacao (Especializacao) VALUES ('$especializacao')";
if ($conn->query($sql_formacao) === TRUE) {
      echo "Formação cadastrada com sucesso.";
        } else {
            echo "Erro ao inserir formação: " . $conn->error;
        }
}

$conn->close();
?>


  </body>
</html>
