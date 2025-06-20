<?php
session_start();
include_once("../../data/data.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaVerify = $_POST['confirmarSenha'];
    if (empty($nome) || empty($email) || empty($senha) || empty($senhaVerify)) {
        $_SESSION['mensagem'] = 'erro!! Preencha todos os campos!';
        header('location: ../pages/cadastro.php');
        exit;
    } elseif ($senha === $senhaVerify) {
        $senhaVerify = password_hash($senhaVerify, PASSWORD_DEFAULT);
        $sql = "SELECT email FROM usuarios WHERE email = :email";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $_SESSION['mensagem'] = 'Este e-mail já está cadastrado.';
            header('Location: ../pages/cadastro.php');
            exit;
        }
        try {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $conexao->prepare($sql);
            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senhaVerify
            ]);
            header('location: ../pages/cadastro.php');
            exit;
        } catch (\Throwable $th) {
            die("Erro na conexão ou inserção: " . $e->getMessage());
        }
    } else {
        $_SESSION['mensagem'] = 'senha incorreta.';
        header('location: ../pages/cadastro.php');
        exit;
    }
} else {
    $_SESSION['mensagem'] = 'erro ao cadastar usuario';
    header('location: ../pages/cadastro.php');
    exit;
}
