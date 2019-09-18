<?php

include '../../server/connection.php';
$conn = getConnection();

try {
    $stmt =  $conn->prepare("UPDATE produto SET Nome = :nome, PrecoCusto = :preco, PercentualLucro = :lucro, Descricao = :descr WHERE IdProduto = :id");
    $stmt->execute(array(
        ':nome' => $_POST["name_product"],
        ':preco' => $_POST["preco_custo"],
        ':lucro' => $_POST["preco_lucro"],
        ':descr' => $_POST["desc"],
        ':id' => $_POST["IdProduto"],
    ));

    if ($stmt->rowCount() == 1) {
        header('Location: ../Lista.php'); //redirecionando...
    } else {
        echo "Algo de errado com a solicitação";
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
