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
            <a class="active">Editando Produto</a>            
            <a href="./Lista.php">Voltar</a>
        </div>
    </div>
    <?php
    include '../server/connection.php';
    $conn = getConnection();
    $sql = 'SELECT * FROM produto WHERE produto.IdProduto =' . $_POST['IdProduto'];
    foreach ($conn->query($sql) as $row) {
        $nome = $row['Nome'] ;
        $preco= $row['PrecoCusto'];
        $lucro= $row['PercentualLucro'];
        $unidade= $row['UnidadeMedida'];
        $descr = $row['Descricao'];
    }
    echo ' <div class="row">
        <form class="col s12" action="./controllers/update.php" method="POST">
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s6 ">
                        <input id="product_name" value="' . $nome . '" name="name_product" type="text" class="validate " data-length="10">
                        <label for="product_name">Nome do Produto</label>
                    </div>
                    <div class="input-field inline">
                        <input id="preco_custo" data-length="10"  value="' . $preco . '"name="preco_custo" type="number" class="validate p">
                        <label for="preco_custo">Preco (R$)</label>
                    </div>
                    <div class="input-field inline">
                        <input id="preco_lucro" data-length="10" value="' . $lucro . '"name="preco_lucro" type="number" class="validate p">
                        <label for="preco_lucro">Lucro (%)</label>
                    </div>
                    <div class="edit inline">
                        <select class="browser-default " name="unidade" disabled>
                            <option value="' . $unidade . ' selected>Unidade de Medida</option>
                            <option value="kg">Kg</option>
                            <option value="g">Grama</option>
                            <option value="l">Litro</option>
                            <option value="ml">Militro</option>
                        </select>
                    </div>
                    <div>
                        <div class="input-field col s12">
                            <textarea id="textarea1" name="desc" class="materialize-textarea" data-length="50">' . $descr . '</textarea>
                            <label for="textarea1">Descrição</label>
                        </div>
                        <input type="hidden" name="IdProduto" value="' . $_POST['IdProduto'] . '">

                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Salvar
                        <i class="material-icons right">send</i>
                    </button>
                </div>

        </form>
    </div>';
    ?>
    <script>
        $(document).ready(function() {
            M.updateTextFields();
        });
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>

</html>