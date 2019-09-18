<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <title>Pão Gramação</title>
</head>

<body>
    <div class="header">
        <a href="../../Index.html" class="logo">Pão Gramação</a>
        <div class="header-right">
            <a class="active" href="">Visualizando os Igredientes</a>
            <a href="../../Index.html">Voltar</a>
        </div>
    </div>

    <div>
        <?php
        include '../server/connection.php';
        $conn = getConnection();
        $sql = 'SELECT m.UnidadeMedida as "uni", m.Nome as "mat", i.Quantidade as "qtd"
            FROM ingrediente i 
            JOIN produto p ON (i.idProduto = p.IdProduto) 
            JOIN materiaprima m ON (i.idMateriaPrima = m.IdMateriaPrima) 
            WHERE i.IdProduto =' . $_POST['IdProduto'];

        echo '
            <table class="responsive-table centered">
                <thead>
                    <tr>
                        <th>Ingredientes</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($conn->query($sql) as $row) {
            echo '<tr>
                <td>' . $row['mat'] . '</td>
                <td>' . $row['qtd'].'/'.$row['uni']. '</td>
            </tr>';
        }
        echo '   
            </tbody>
            </table>
            '

        ?>
    </div>

    <script>
        $(document).ready(function() {
            M.updateTextFields();
        });
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>

</html>