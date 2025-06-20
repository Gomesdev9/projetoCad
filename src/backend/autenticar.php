<?php
session_start();
include_once("../../data/data.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; 
    $senha = $_POST['senha'];
    $sql = $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $verifica = $stmt->fetchAll(PDO::FETCH_COLUMN);
    if (empty($email) || empty($senha)) {
        $_SESSION['mensagem'] = 'erro!! Preencha todos os campos!';
        header('location: ../pages/cadastro.php');
        exit;
    }if ($) {
        # code...
    }
}

?>