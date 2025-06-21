<?php
session_start();
include_once("../../data/data.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    if (empty($email) || empty($senha)) {
        $_SESSION['value'] = $email;
        $_SESSION['mensagem'] = 'erro!! Preencha todos os campos!';
        header('location: ../pages/cadastro.php');
        exit;
    }
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $verifica = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($verifica && password_verify($senha, $verifica['senha'])) {
        $_SESSION['logado'] = true;
        $_SESSION['id_User'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];
        header('Location: ../pages/dashboard.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'email incorreto!';
        header('location: ../pages/cadastro.php');
        exit;
    }
}
