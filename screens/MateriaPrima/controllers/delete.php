<?php
//Acessando o banco de dados
include '../../server/connection.php';
$conn = getConnection();


$deletar = $conn->prepare("DELETE FROM materiaprima WHERE materiaprima.IdMateriaPrima = :id");

$deletar->bindValue(":id", $_POST["IdMateriaPrima"]);

//Executando
if($deletar->execute()){
    header('Location: ../lista.php'); //redirecionando...
 }else{
    echo 'Erro ao salvar';
 }