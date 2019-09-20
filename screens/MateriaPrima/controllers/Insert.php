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

if($_POST["QtdEstoqueMinimo"] <= 0){
    echo "erro, valor deve ser acima de 0";
    return;
}else{
    $qtdmin = $_POST["QtdEstoqueMinimo"];
}

if($_POST["unidade"] <= 0){
    echo "erro, valor deve ser acima de 0";
    return;
}else{
    $qtdmin = $_POST["unidade"];
}


$stmt = $pdo->prepare('INSERT INTO materiaprima (Nome, Descricao, UnidadeMedida, Preco, QtdEstoque, QtdEstoqueMinimo) VALUES (:nome, :descr, :unidade, :preco, :qtdEstoque, :QtdEstoqueMinimo)');
$stmt->execute(array(
    ':nome' => $_POST["name"],
    ':descr' => $_POST["desc"],
    ':unidade' => $uni,
    ':preco' => $preco,
    ':qtdEstoque' => $_POST["QtdEstoque"],
    ':QtdEstoqueMinimo' => $qtdmin,
));
if ($stmt->rowCount() == 1) {
    header('Location: ../lista.php'); //redirecionando...
} else {
    echo "Erro ao salvar";
}
