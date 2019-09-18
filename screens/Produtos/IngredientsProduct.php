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
            <a class="active" href="">Adionar Igredientes</a>
            <a href="../../Index.html">Voltar</a>
        </div>
    </div>
    <?php
    if (empty($_COOKIE['id'])) {
        setcookie("id", $_POST["IdProduto"]);
    }
    include '../server/connection.php';
    $conn = getConnection();
    $sql = 'SELECT * FROM materiaprima';

    echo '
        <table class="responsive-table centered">
            <thead>
                <tr>
                    <th>Igredientes</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>';
    echo '
    <tr><td> 
    <form action="./controllers/InsertIng.php" method="POST">
        <div class="ig inline">
            <select class="browser-default " name="IdMateriaPrima">';
    foreach ($conn->query($sql) as $row) {
        echo ' <option value="' . $row['IdMateriaPrima'] . '">' . $row['Nome'] . '</option>';
    }
    echo '        
            </select>
        </div></td> ';

    echo ' 
            <td> 
                <div class="input-field inline">
                    <input name="quantidade" type="number" class="validate p">
                    <input type="hidden" name="IdProduto" value="' . $_POST['IdProduto'] . '">
                </div>
            </td> 
            <td> 
            <button class="btn waves-effect waves-light" type="submit" name="action">Add<i class="material-icons right">add</i></button>
    </form>
    <td><tr>
    </tbody>
    </table>
    ';


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