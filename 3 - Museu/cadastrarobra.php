<html>
  <head>
   <style>
      #cadastrarobra {
        text-align: center;
        top: 100px;
        font-size: 30px;
      }
	  
	  #escultura {
        text-align: center;
        top: 100px;
        font-size: 30px;
      }
	  
	  #pintura {
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
    <h1>Cadastrar Obra</h1>
  </head>
  <body>
    <p style="color: rgb(255,255,255);" id="cadastrarobra">Área de Inserção dos Dados</p>
    <form action="cadastrarobra.php" method="POST">
        <label for="andar">Título:</label>
        <input type="text" name="Titulo" required>
        <br>
		<label for="andar">Ano:</label>
        <input type="text" name="Ano" required>
        <br>
		<label for="sala">Número do Salão:</label>
        <input type="text" name="sala" required>
        <br>
		<label for="autor">Código do Autor:</label>
        <input type="text" name="autor" required>
        <br>
		<p style="color: rgb(255,255,255);" id="escultura">Escultura</p>
		<label for="peso">Peso:</label>
        <input type="text" name="Peso">
        <br>
		<label for="material">Material:</label>
        <input type="text" name="Material">
        <br>
		<p style="color: rgb(255,255,255);" id="pintura">Pintura</p>
		<label for="estilo">Estilo:</label>
        <input type="text" name="Estilo">
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

// Verifica se dentro do método POST os campos existem e têm algum valor
if (isset($_POST['Titulo']) && isset($_POST['Ano']) && isset($_POST['sala']) && isset($_POST['autor'])) {
    $titulo = $_POST['Titulo'];
	$ano = $_POST['Ano'];
	$sala = $_POST['sala'];
	$autor = $_POST['autor'];

    // Verifica se o número do salão existe
	$sql_salao = "SELECT Numero FROM Salao WHERE Numero = '$sala'";
	$result_salao = $conn->query($sql_salao);
	if ($result_salao->num_rows == 0) {
		echo "Salão não existente.";
exit();
}

// Verifica se o código do autor existe
$sql_autor = "SELECT Codigo FROM Autor WHERE Codigo = '$autor'";
$result_autor = $conn->query($sql_autor);
if ($result_autor->num_rows == 0) {
echo "Autor não está no sistema do museu.";
exit();
}

// Insere os dados da obra na tabela Obra
$sql_obra = "INSERT INTO Obra (Titulo, Ano, SalaoNumero, AutorCodigo) VALUES ('$titulo', '$ano', '$sala', '$autor')";
if ($conn->query($sql_obra) === TRUE) {
echo "Obra cadastrada com sucesso.";
$obra_codigo = $conn->insert_id;

// Verifica se foi selecionada a especialização de Escultura
if (isset($_POST['Peso']) && isset($_POST['Material']) && empty($_POST['Estilo'])) {
	$peso = $_POST['Peso'];
	$material = $_POST['Material'];

	// Insere os dados da escultura na tabela Escultura
	$sql_escultura = "INSERT INTO Escultura (ObraCodigo, Peso, Material) VALUES ('$obra_codigo', '$peso', '$material')";
	if ($conn->query($sql_escultura) === TRUE) {
		echo "Escultura cadastrada com sucesso.";
	} else {
		echo "Erro ao cadastrar escultura: " . $conn->error;
	}
}

// Verifica se foi selecionada a especialização de Pintura
if (isset($_POST['Estilo']) && empty($_POST['Peso']) && empty($_POST['Material'])) {
	$estilo = $_POST['Estilo'];

	// Insere os dados da pintura na tabela Pintura
	$sql_pintura = "INSERT INTO Pintura (ObraCodigo, Estilo) VALUES ('$obra_codigo', '$estilo')";
	if ($conn->query($sql_pintura) === TRUE) {
		echo "Pintura cadastrada com sucesso.";
	} else {
		echo "Erro ao cadastrar pintura: " . $conn->error;
	}
}
} else {
echo "Erro ao cadastrar obra: " . $conn->error;
}
}

$conn->close();
?>

</body>
</html>