<html>
  <head>
   <style>
      #requeremanutencao {
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
	  
      textarea {
        display: block;
        margin: 0 auto;
        font-size: 16px;
        resize: vertical;
        width: 300px;
        height: 100px;
        text-align: center;
      }
      
      .center-align {
        text-align: center;
        margin: 0 auto;
      }
	  
      body {
        background-color: #DC143C;
      }
	  
    </style>
    <h1>Requer Manutenção</h1>
  </head>
  <body>
    <p style="color: rgb(255,255,255);" id="requeremanutencao">Área de Dados para Requerer Manutenção</p>
    <form action="requeremanutencao.php" method="POST">
        <label for="codigoObra">Código da Obra:</label>
        <input type="text" name="codigoObra" required>
        <br>
        <label for="materiasPrimas">Código(s) da(s) Matéria(s)-Prima(s) (separados por vírgula):</label>
        <input type="text" name="materiasPrimas" required>
        <br>
        <label for="quantidades">Quantidade(s) (separadas por vírgula):</label>
        <input type="text" name="quantidades" required>
        <br>
        <label for="custosUnitarios">Custo(s) Unitário(s) (separados por vírgula):</label>
        <input type="text" name="custosUnitarios" required>
        <br>
        <label for="dataInicio">Data de Início:</label>
        <input type="date" name="dataInicio" required>
        <br>
        <label for="dataPrevistaTermino">Data Prevista de Término:</label>
        <input type="date" name="dataPrevistaTermino" required>
        <br>
        <label for="descricaoServico">Descrição do Serviço:</label>
        <textarea name="descricaoServico" rows="4" cols="50" required></textarea>
        <br>
        <input type="submit" value="Requerer Manutenção">
    </form>

<?php
include 'conecta.php';

if (isset($_POST['codigoObra']) && isset($_POST['materiasPrimas']) && isset($_POST['quantidades']) && isset($_POST['custosUnitarios']) && isset($_POST['dataInicio']) && isset($_POST['dataPrevistaTermino']) && isset($_POST['descricaoServico'])) {
    $codigoObra = $_POST['codigoObra'];
    $materiasPrimas = $_POST['materiasPrimas'];
    $quantidades = $_POST['quantidades'];
    $custosUnitarios = $_POST['custosUnitarios'];
    $dataInicio = $_POST['dataInicio'];
    $dataPrevistaTermino = $_POST ['dataPrevistaTermino'];
    $descricaoServico = $_POST['descricaoServico'];
	
// Verificar se a obra existe
$sql_verifica_obra = "SELECT * FROM Obra WHERE Codigo = '$codigoObra'";
$result_verifica_obra = $conn->query($sql_verifica_obra);

if ($result_verifica_obra->num_rows == 0) {
    echo "A obra não foi encontrada.";
} else {
    // Inserir registro na tabela Manutencao
    $sql_inserir_manutencao = "INSERT INTO Manutencao (DataInicio, DataPrevistaTermino, DescricaoServico, ObraCodigo) VALUES ('$dataInicio', '$dataPrevistaTermino', '$descricaoServico', '$codigoObra')";
    $result_inserir_manutencao = $conn->query($sql_inserir_manutencao);

    if ($result_inserir_manutencao) {
        $manutencaoID = $conn->insert_id;

        // Separar os códigos das matérias-primas, quantidades e custos unitários em arrays
        $materiasPrimasArray = explode(",", $materiasPrimas);
        $quantidadesArray = explode(",", $quantidades);
        $custosUnitariosArray = explode(",", $custosUnitarios);

        // Inserir registros na tabela ManutencaoMateriaPrima
        for ($i = 0; $i < count($materiasPrimasArray); $i++) {
            $materiaPrimaCodigo = trim($materiasPrimasArray[$i]);
            $quantidadeUtilizada = trim($quantidadesArray[$i]);
            $custoUnitario = trim($custosUnitariosArray[$i]);

            $sql_inserir_manutencao_materiaprima = "INSERT INTO ManutencaoMateriaPrima (ManutencaoID, MateriaPrimaCodigo, QuantidadeUtilizada, CustoUnitario) VALUES ('$manutencaoID', '$materiaPrimaCodigo', '$quantidadeUtilizada', '$custoUnitario')";
            $result_inserir_manutencao_materiaprima = $conn->query($sql_inserir_manutencao_materiaprima);

            if (!$result_inserir_manutencao_materiaprima) {
                echo "Erro ao inserir matéria-prima: " . $conn->error;
                exit;
            }
        }

        echo "Manutenção requerida com sucesso.";
    } else {
        echo "Erro ao requerer manutenção: " . $conn->error;
    }
}
}

$conn->close();
?>

</body>
</html>	