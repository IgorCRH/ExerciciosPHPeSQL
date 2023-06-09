<!DOCTYPE html>
<html>
<head>
    <title>Lista de Ferramentas</title>
</head>
<body>
    <h1>Lista de Ferramentas</h1>

    <?php
    // Incluir o arquivo de conexão
    require_once "conecta.php";

    // Definir o conjunto de caracteres
    mysqli_set_charset($conn, "utf8");

    // Preparar e executar a consulta SQL
    $sql = "SELECT * FROM tb_ferramentas";
    $result = mysqli_query($conn, $sql);

    // Verificar se existem resultados
    if (mysqli_num_rows($result) > 0) {
        // Exibir os dados em uma tabela
        echo "<table>";
        echo "<tr><th>CódigoFerramenta</th><th>Nome</th><th>Marca</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["CodigoFerramenta"] . "</td>";
            echo "<td>" . $row["Nome"] . "</td>";
            echo "<td>" . $row["Marca"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma ferramenta cadastrada.";
    }

    // Fechar a conexão
    mysqli_close($conn);
    ?>
</body>
</html>
