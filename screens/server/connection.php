<?php
function getConnection()
{

    $host = 'localhost'; //Host aonde esta o banco de dados
    $dbname = 'paogramacao'; //Nome do banco de dados
    $user = 'root'; // Usuario
    $pass = 'root'; // Senha

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname; //dsn para fazer a conexão usando o PDO

    try {
        $pdo = new PDO($dsn, $user, $pass); //Fazendo a conexão
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOExeption $ex) { //Tratando algum erro, caso tenha
        echo 'Erro: ' . $ex->getMessage();
    }
}
