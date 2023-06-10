<html>
  <head>
   <style>

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
    <h1>Seção de Remoção de Médicos</h1>
  </head>
  <body>
    <form action="removemedico.php" method="POST">
        <label for="salario">CRM do Médico:</label>
        <input type="text" name="CRMRemocao" required>
        <br>
        <input type="submit" value="Remover">
    </form>

<?php
include 'conecta.php';

if (isset($_POST['CRMRemocao'])) {
$crmremocao_id = $_POST['CRMRemocao'];

    $sql_verifica_crm = "SELECT * FROM tb_medico WHERE CRM = '$crmremocao_id'";
    $result_verifica_crm = $conn->query($sql_verifica_crm);

    if ($result_verifica_crm->num_rows == 0) {
        echo "O médico não foi encontrado na clínica.";
    } else {
   $sql_remocao_medico = "DELETE FROM tb_medico WHERE CRM = '$crmremocao_id'";
if ($conn->query($sql_remocao_medico) === TRUE) {
    echo "Médico foi removido.";
} else {
    echo "Erro ao remover o médico: " . $conn->error;
}
}
}

$conn->close();
?>

</body>
</html>
