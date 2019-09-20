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
            <a href="./lista.php">Lista</a>
            <a class="active" href="#">Adicionar Produto</a>
            <a href="../../Index.html">Voltar</a>
        </div>
    </div>

    <div class="row">
        <form class="col s12" action="./controllers/Insert.php" method="POST">
            <div class="row">
                <div class="col s12">
                    <!-- input para o nome -->
                    <div class="input-field col s6 ">
                        <input id="name" name="name" type="text" class="validate " data-length="15">
                        <label for="name">Nome da Materia Prima</label>
                    </div>
                    <div class="input-field inline">
                        <input id="preco_custo" data-length="10" require name="preco_custo" pattern="[3-9]+$" type="number" class="validate p">
                        <label for="preco_custo">Preco (R$)</label>
                    </div>

                    <!-- Estoque -->
                    <div class="input-field inline">
                        <input id="QtdEstoque" data-length="10" require name="QtdEstoque" pattern="[1-9]+$" type="number" class="validate p">
                        <label for="QtdEstoque">Estoque (max)</label>
                    </div>

                    <div class="input-field inline">
                        <input id="QtdEstoqueMinimo" data-length="10" require name="QtdEstoqueMinimo" pattern="[1-9]+$" type="number" class="validate p">
                        <label for="QtdEstoqueMinimo">Estoque (min)</label>
                    </div>
                    <!-- Unidade de medida -->
                    <div class="edit inline">
                        <select class="browser-default " name="unidade" require>
                            <option value="" disabled selected>Unidade de Medida</option>
                            <option value="kg">Kg</option>
                            <option value="g">Grama</option>
                            <option value="l">Litro</option>
                            <option value="ml">Militro</option>
                            <option value="uni">Unidade</option>
                        </select>
                    </div>
                    <div>
                        <div class="input-field col s12">
                            <textarea id="textarea1" name="desc" class="materialize-textarea" data-length="50"></textarea>
                            <label for="textarea1">Descrição</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
                        <i class="material-icons right">send</i>
                    </button>
                </div>

        </form>
    </div>

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