<html>
  <head>
   <style>
      #registramateriaprima {
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
    <h1>Registrar Matéria-Prima</h1>
  </head>
  <body>
    <p style="color: rgb(255,255,255);" id="registramateriaprima">Área de Inserção dos Dados</p>
    <form action="registrarmateriaprima.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="Nome" required>
        <br>
		<label for="quantidade">Quantidade:</label>
        <input type="text" name="Quantidade" required>
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

// Verifica se dentro do método POST os campos existem e tem algum valor
if (isset($_POST['Nome']) && isset($_POST['Quantidade'])) {
    $nome = $_POST['Nome'];
	$quantidade = $_POST['Quantidade'];

    // Insere os dados de endereço na tabela tb_endereco
    $sql_materiaprima = "INSERT INTO MateriaPrima (Nome, Quantidade) VALUES ('$nome', '$quantidade')";
        if ($conn->query($sql_materiaprima) === TRUE) {
            echo "Matéria-Prima registrada com sucesso.";
        } else {
            echo "Erro ao registrar matéria-prima: " . $conn->error;
        }
    }

$conn->close();
?>

</body>
</html>