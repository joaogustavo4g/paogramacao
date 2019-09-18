<?php
//Acessando o banco de dados
include '../../server/connection.php';
$pdo = getConnection();

$stmt = $pdo->prepare('INSERT INTO ingrediente (IdProduto, IdMateriaPrima, Quantidade) VALUES (:idProduto, :idMateriaPrima, :quantidade)');
$stmt->execute(array(
    ':idProduto' => $_COOKIE['id'],
    ':idMateriaPrima' => $_POST["IdMateriaPrima"],
    ':quantidade' => $_POST["quantidade"],
));

if ($stmt->rowCount() == 1) {
    header("Location: ../IngredientsProduct.php");//redirecionando...
} else {
    echo "Erro ao salvar";
}
