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
            <a class="active">Editando Materia Prima</a>
            <a href="../../Index.html">Voltar</a>
        </div>
    </div>

    <?php
    include '../server/connection.php';
    $conn = getConnection();
    $sql = 'SELECT * FROM materiaprima WHERE materiaprima.IdMateriaPrima =' . $_POST['IdMateriaPrima'];
    foreach ($conn->query($sql) as $row) {
        $nome = $row['Nome'];
        $preco = $row['Preco'];
        $unidade = $row['UnidadeMedida'];
        $descr = $row['Descricao'];
        $qtdEstoque = $row['QtdEstoque'];
        $QtdEstoqueMinimo = $row['QtdEstoqueMinimo'];
    }
    echo '  <div class="row">
    <form class="col s12" action="./controllers/update.php" method="POST">
        <div class="row">
            <div class="col s12">
                <!-- input para o nome -->
                <div class="input-field col s6 ">
                    <input id="name" name="name" value="' . $nome . '" type="text" class="validate " data-length="15">
                    <label for="name">Nome da Materia Prima</label>
                </div>
                <div class="input-field inline">
                    <input id="preco_custo" data-length="10" value="' . $preco . '" name="preco_custo" type="number" class="validate p">
                    <label for="preco_custo">Preco (R$)</label>
                </div>

                <!-- Estoque -->
                <div class="input-field inline">
                    <input id="QtdEstoque" data-length="10" value="' . $qtdEstoque . '" name="QtdEstoque" type="number" class="validate p">
                    <label for="QtdEstoque">Estoque (max)</label>
                </div>

                <div class="input-field inline">
                    <input id="QtdEstoqueMinimo" data-length="10" value="' . $QtdEstoqueMinimo . '" name="QtdEstoqueMinimo" type="number" class="validate p">
                    <label for="QtdEstoqueMinimo">Estoque (min)</label>
                </div>
                <!-- Unidade de medida -->
                <div class="edit inline">
                    <select class="browser-default " name="unidade">
                        <option value="' . $unidade . '"  selected>' . $unidade . '</option>
                        <option value="kg">Kg</option>
                        <option value="g">Grama</option>
                        <option value="l">Litro</option>
                        <option value="ml">Militro</option>
                    </select>
                </div>
                <div>
                    <div class="input-field col s12">
                        <textarea id="textarea1" name="desc" class="materialize-textarea" data-length="50">' . $descr  . '</textarea>
                        <label for="textarea1">Descrição</label>
                    </div>
                    <input type="hidden" name="IdMateriaPrima" value="' . $_POST['IdMateriaPrima'] . '">
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
                    <i class="material-icons right">send</i>
                </button>
            </div>

    </form>
</div>
';
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