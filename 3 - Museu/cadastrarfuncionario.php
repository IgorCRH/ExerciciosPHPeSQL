<html>
  <head>
   <style>
      #cadastrarfuncionario {
        text-align: center;
        top: 100px;
        font-size: 30px;
      }
	  
	  #guarda {
        text-align: center;
        top: 100px;
        font-size: 30px;
      }
	  
	  #restaurador {
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
    <h1>Cadastro de Funcionários</h1>
  </head>
  <body>
    <p style="color: rgb(255,255,255);" id="cadastrarfuncionario">Área de Inserção dos Dados</p>
    <form action="cadastrarfuncionario.php" method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" name="CPF" required>
        <br>
		<label for="nome">Nome:</label>
        <input type="text" name="Nome" required>
        <br>
		<label for="salario">Salário:</label>
        <input type="text" name="Salario" required>
        <br>
		<p style="color: rgb(255,255,255);" id="guarda">Guardas</p>
		<label for="horaentrada">Hora de Entrada:</label>
        <input type="text" name="HoraEntrada">
        <br>
		<label for="horasaida">Hora de Saída:</label>
        <input type="text" name="HoraSaida">
        <br>
		<p style="color: rgb(255,255,255);" id="restaurador">Restaurador</p>
		<label for="especialidade">Especialidade:</label>
        <input type="text" name="Especialidade">
        <br>
        <input type="submit" value="Inserir">
    </form>

<?php
include 'conecta.php';

// Verifica se dentro do método POST os campos existem e têm algum valor
if (isset($_POST['CPF']) && isset($_POST['Nome']) && isset($_POST['Salario'])) {
    $cpf = $_POST['CPF'];
	$nome = $_POST['Nome'];
	$salario = $_POST['Salario'];


// Insere os dados da obra na tabela Obra
$sql_funcionario = "INSERT INTO Funcionarios (CPF, Nome, Salario) VALUES ('$cpf', '$nome', '$salario')";
if ($conn->query($sql_funcionario) === TRUE) {
echo "Funcionario cadastrado com sucesso.";
$funcionarios_id = $conn->insert_id;

// Verifica se foi selecionada a especialização Guarda
if (isset($_POST['HoraEntrada']) && isset($_POST['HoraSaida']) && empty($_POST['Especialidade'])) {
	$horaentrada = $_POST['HoraEntrada'];
	$horasaida = $_POST['HoraSaida'];

	// Insere os dados da pintura na tabela Pintura
	$sql_guarda = "INSERT INTO Guardas (FuncionarioID, HoraEntrada, HoraSaida) VALUES ('$funcionarios_id', '$horaentrada', '$horasaida')";
	if ($conn->query($sql_guarda) === TRUE) {
		echo "O funcionario Guarda foi cadastrado com sucesso.";
	} else {
		echo "Erro ao cadastrar o guarda: " . $conn->error;
	}
}

// Verifica se foi selecionada a especialização Restaurador
if (isset($_POST['Especialidade']) && empty($_POST['HoraEntrada']) && empty($_POST['HoraSaida'])) {
	$especialidade = $_POST['Especialidade'];

	// Insere os dados da escultura na tabela Escultura
	$sql_restaurador = "INSERT INTO Restauradores (FuncionarioID, Especialidade) VALUES ('$funcionarios_id', '$especialidade')";
	if ($conn->query($sql_restaurador) === TRUE) {
		echo "O funcionario restaurador foi cadastrado com sucesso.";
	} else {
		echo "Erro ao cadastrar restaurador: " . $conn->error;
	}
}
} else {
echo "Erro ao cadastrar funcionario: " . $conn->error;
}
}

$conn->close();
?>

</body>
</html>