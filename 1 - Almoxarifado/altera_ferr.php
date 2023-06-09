<!DOCTYPE html>
<html>
<head>
    <title>Alteração de Ferramentas</title>
</head>
<body>
    <h1>Alteração de Ferramentas</h1>
    <form action="altera_ferr.php" method="POST">
        <label for="codigo">Código da ferramenta:</label>
        <input type="text" name="codigo" required>
        <br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required>
        <br>
        <input type="submit" value="Alterar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Incluir o arquivo de conexão
        require_once "conecta.php";

        // Obter os valores do formulário
        $codigo = $_POST["codigo"];
        $nome = $_POST["nome"];
        $marca = $_POST["marca"];

        // Preparar e executar a consulta SQL
        $sql = "UPDATE tb_ferramentas SET Nome='$nome', Marca='$marca' WHERE CodigoFerramenta='$codigo'";
        if (mysqli_query($conn, $sql)) {
            echo "Ferramenta alterada com sucesso!";
        } else {
            echo "Erro ao alterar a ferramenta: " . mysqli_error($conn);
        }

        // Fechar a conexão
        mysqli_close($conn);
    }
    ?>
</body>
</html>
