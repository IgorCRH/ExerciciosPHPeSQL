<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Ferramentas</title>
</head>
<body>
    <h1>Cadastro de Ferramentas</h1>
    <form action="inserir_ferr.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required>
        <br>
        <input type="submit" value="Cadastrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Incluir o arquivo de conexão
        require_once "conecta.php";

        // Obter os valores do formulário
        $nome = $_POST["nome"];
        $marca = $_POST["marca"];

        // Preparar e executar a consulta SQL
        $sql = "INSERT INTO tb_ferramentas (Nome, Marca) VALUES ('$nome', '$marca')";
        if (mysqli_query($conn, $sql)) {
            echo "Ferramenta cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar a ferramenta: " . mysqli_error($conn);
        }

        // Fechar a conexão
        mysqli_close($conn);
    }
    ?>
</body>
</html>
