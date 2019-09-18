<?php
//Acessando o banco de dados
include '../../server/connection.php';
$pdo = getConnection();

$stmt = $pdo->prepare('INSERT INTO materiaprima (Nome, Descricao, UnidadeMedida, Preco, QtdEstoque, QtdEstoqueMinimo) VALUES (:nome, :descr, :unidade, :preco, :qtdEstoque, :QtdEstoqueMinimo)');
$stmt->execute(array(
    ':nome' => $_POST["name"],
    ':descr' => $_POST["desc"],
    ':unidade' => $_POST["unidade"],
    ':preco' => $_POST["preco_custo"],
    ':qtdEstoque' => $_POST["QtdEstoque"],
    ':QtdEstoqueMinimo' => $_POST["QtdEstoqueMinimo"],
));
if ($stmt->rowCount() == 1) {
    header('Location: ../lista.php'); //redirecionando...
} else {
    echo "Erro ao salvar";
}
