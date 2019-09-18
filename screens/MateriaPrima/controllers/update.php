<?php

include '../../server/connection.php';
$conn = getConnection();
try {
    $stmt =  $conn->prepare("UPDATE materiaprima SET Nome = :nome, Descricao = :descr, UnidadeMedida = :unidade, Preco = :preco, QtdEstoque = :qtdEstoque, QtdEstoqueMinimo = :qtdEstoqueMinimo WHERE IdMateriaPrima = :id");
    $stmt->execute(array(
        ':nome' => $_POST["name"],
        ':descr' => $_POST["desc"],
        ':preco' => $_POST["preco_custo"],
        ':unidade' => $_POST["unidade"],
        ':qtdEstoque' => $_POST["QtdEstoque"],
        ':qtdEstoqueMinimo' => $_POST["QtdEstoqueMinimo"],
        ':id' => $_POST['IdMateriaPrima'],
    ));
    if ($stmt->rowCount() == 1) {
        header('Location: ../lista.php'); //redirecionando...
    } else {
        echo "Erro ao salvar";
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
