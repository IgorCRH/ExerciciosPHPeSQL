<html>
  <head>
   <style>
      #registrarsalao {
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
    <h1>Registrar Salão</h1>
  </head>
  <body>
    <p style="color: rgb(255,255,255);" id="registrarsalao">Área de Inserção dos Dados</p>
    <form action="registrarsalao.php" method="POST">
        <label for="andar">Andar:</label>
        <input type="text" name="Andar" required>
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

// Verifica se dentro do método POST os campos existem e tem algum valor
if (isset($_POST['Andar'])) {
    $andar = $_POST['Andar'];

    // Insere os dados de endereço na tabela tb_endereco
    $sql_salao = "INSERT INTO Salao (Andar) VALUES ('$andar')";
        if ($conn->query($sql_salao) === TRUE) {
            echo "Salao registrado com sucesso.";
        } else {
            echo "Erro ao registrar salao: " . $conn->error;
        }
    }

$conn->close();
?>


</body>
</html>
