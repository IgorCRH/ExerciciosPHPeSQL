<html>
<head>
    <style>
        #manutencoes {
            text-align: center;
            top: 100px;
            font-size: 30px;
        }

        h1 {
            text-align: center;
            line-height: 1;
            height: 100px;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
			color: black;
        }

        body {
            background-color: #DC143C;
            color: #fff; /* Define a cor do texto como branco */
        }

    </style>
    <h1>Listagem de Manutenções</h1>
</head>
<body>
    <p style="color: rgb(255,255,255);" id="manutencoes">Manutenções Cadastradas</p>

    <table>
        <tr>
            <th>ID</th>
            <th>Data de Início</th>
            <th>Data Prevista de Término</th>
            <th>Descrição do Serviço</th>
            <th>Custo Previsto</th>
            <th>Código da Obra</th>
        </tr>

        <?php
        include 'conecta.php';

        $sql_manutencoes = "SELECT * FROM Manutencao";
        $result_manutencoes = $conn->query($sql_manutencoes);

        if ($result_manutencoes->num_rows > 0) {
            while ($row = $result_manutencoes->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['DataInicio'] . "</td>";
                echo "<td>" . $row['DataPrevistaTermino'] . "</td>";
                echo "<td>" . $row['DescricaoServico'] . "</td>";
                echo "<td>" . $row['CustoPrevisto'] . "</td>";
                echo "<td>" . $row['ObraCodigo'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhuma manutenção cadastrada.</td></tr>";
        }

        $conn->close();
        ?>

    </table>
</body>
</html>
