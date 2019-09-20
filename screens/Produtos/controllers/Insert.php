<?php
//Acessando o banco de dados
include '../../server/connection.php';
$pdo = getConnection();


if($_POST["preco_custo"] <= 0){
    echo "erro, valor deve ser acima de 0";
    return;
}else{
    $preco = $_POST["preco_custo"];
}

if($_POST["preco_lucro"] <= 0){
    echo "erro, valor deve ser acima de 0";
    return;
}else{
    $lucro = $_POST["preco_lucro"];
}

$stmt = $pdo->prepare('INSERT INTO produto (Nome, Descricao, UnidadeMedida, PrecoCusto, PercentualLucro) VALUES (:nome, :descr, :unidade, :preco, :lucro)');
$stmt->execute(array(
    ':nome' => $_POST["name_product"],
    ':preco' => $preco,
    ':lucro' => $lucro,
    ':unidade' => $_POST["unidade"],
    ':descr' => $_POST["desc"],
));
if ($stmt->rowCount() == 1) {
    header('Location: ../Lista.php'); //redirecionando...
} else {
    echo "Erro ao salvar";
}
