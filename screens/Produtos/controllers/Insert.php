<?php
//Acessando o banco de dados
include '../../server/connection.php';
$pdo = getConnection();

$stmt = $pdo->prepare('INSERT INTO produto (Nome, Descricao, UnidadeMedida, PrecoCusto, PercentualLucro) VALUES (:nome, :descr, :unidade, :preco, :lucro)');
$stmt->execute(array(
    ':nome' => $_POST["name_product"],
    ':preco' => $_POST["preco_custo"],
    ':lucro' => $_POST["preco_lucro"],
    ':unidade' => $_POST["unidade"],
    ':descr' => $_POST["desc"],
));
if ($stmt->rowCount() == 1) {
    header('Location: ../Lista.php'); //redirecionando...
} else {
    echo "Erro ao salvar";
}
