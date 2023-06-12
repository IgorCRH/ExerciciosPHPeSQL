<html>
  <head>
   <style>
      #insereautor {
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
    <h1>Inserção de Autor</h1>
  </head>
  <body>
    <p style="color: rgb(255,255,255);" id="insereautor">Área de Inserção dos Dados</p>
    <form action="inserirautor.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="Nome" required>
        <br>
        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="Nacionalidade" required>
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

// Verifica se dentro do método POST os campos existem e tem algum valor
if (isset($_POST['Nome']) && isset($_POST['Nacionalidade'])) {
    $nome = $_POST['Nome'];
    $nacionalidade = $_POST['Nacionalidade'];

    // Insere os dados de endereço na tabela tb_endereco
    $sql_autor = "INSERT INTO Autor (Nome, Nacionalidade) VALUES ('$nome', '$nacionalidade')";
        if ($conn->query($sql_autor) === TRUE) {
            echo "Autor inserido com sucesso.";
        } else {
            echo "Erro ao inserir autor: " . $conn->error;
        }
    }

$conn->close();
?>


</body>
</html>
