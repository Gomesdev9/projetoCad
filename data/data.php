<?php
$host = 'localhost';
$db = 'projetoCad';
$user = 'root';
$pass = '';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // Ativa o modo de erro para exceções
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
