<!DOCTYPE html>
<html>
<head>
    <title>Exclusão de Ferramentas</title>
</head>
<body>
    <h1>Exclusão de Ferramentas</h1>
    <form action="exclui_ferr.php" method="POST">
        <label for="id">ID da ferramenta:</label>
        <input type="text" name="codigo" required>
        <br>
        <input type="submit" value="Excluir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Incluir o arquivo de conexão
        require_once "conecta.php";

        // Obter o ID da ferramenta a ser excluída
        // Obter o ID da ferramenta a ser excluída
        $codigo = $_POST["codigo"];

        // Preparar e executar a consulta SQL
        $sql = "DELETE FROM tb_ferramentas WHERE CodigoFerramenta='$codigo'";
        if (mysqli_query($conn, $sql)) {
            echo "Ferramenta excluída com sucesso!";
        } else {
            echo "Erro ao excluir a ferramenta: " . mysqli_error($conn);
        }

        // Fechar a conexão
        mysqli_close($conn);
    }
    ?>
</body>
</html>
