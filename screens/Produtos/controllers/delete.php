<?php
//Acessando o banco de dados
include '../../server/connection.php';
$conn = getConnection();


$deletar = $conn->prepare("DELETE FROM produto WHERE produto.IdProduto = :id");

$deletar->bindValue(":id", $_POST["IdProduto"]);

//Executando
if($deletar->execute()){
    header('Location: ../Lista.php'); //redirecionando...
 }else{
    echo 'Erro ao salvar';
 }