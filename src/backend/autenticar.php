<?php
session_start();
include_once("../../data/data.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; 
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $verifica = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($email) || empty($senha)) {
        $_SESSION['value'] = $email;
        $_SESSION['mensagem'] = 'erro!! Preencha todos os campos!';
        header('location: ../pages/cadastro.php');
        exit;
    }
    if ($verifca['email'] == $email) {
        if (password_verify($senha, $verifica['senha'])) {
        $_SESSION['logado'] = "logado";
        $_SESSION['id_USER'] = $verifica['id_User'];
        $_SESSION['mensagem'] = 'usuario logado com sucesso!';
        header('location: ../pages/cadastro.php');
        exit;
    } else{
        $_SESSION['mensagem'] = 'Senha incorreta!';
        header('location: ../pages/cadastro.php');
        exit;
    }
    }else {
        $_SESSION['mensagem'] = 'email incorreto!';
        header('location: ../pages/cadastro.php');
        exit;
    }
}

?>