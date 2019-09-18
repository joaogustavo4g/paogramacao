<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <title>Pão Gramação</title>
</head>

<body>
    <div class="header">
        <a href="../../Index.html" class="logo">Pão Gramação</a>
        <div class="header-right">
            <a class="active" href="#home">Lista</a>
            <a href="./addMaterial.php">Adicionar Materia Prima</a>
            <a href="../../Index.html">Voltar</a>
        </div>
    </div>
    <div>
        <?php
        include '../server/connection.php';
        $conn = getConnection();
        $sql = 'SELECT * FROM materiaprima';
        echo '
            <table class="responsive-table centered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($conn->query($sql) as $row) {
            echo '<tr>
            <td>' . $row['Nome'] . '</td>
            <td>' . $row['Descricao'] . '</td>
            <td>R$ ' . $row['Preco'] . '</td>
            <td>
                <form action="./editMateria.php" method="POST">
                <input type="hidden" name="IdMateriaPrima" value="' . $row["IdMateriaPrima"] . '">
                <input type="submit" class="button" name="Enviar" value="Editar">
                </form>
            </td>
            <td>
                <form action="./controllers/delete.php" method="POST">
                <input type="hidden" name="IdMateriaPrima" value="' . $row["IdMateriaPrima"] . '">
                <input type="submit" class="button" name="Enviar" value="Deletar">
                </form>
            </td>
                        </tr>';
        }
        echo '  </tbody>
            </table>
            '
        ?>
    </div>
</body>

</html>