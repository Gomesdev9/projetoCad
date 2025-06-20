<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column align-items-center justify-content-center vh-100">

    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-4">Login</h4>
        <form action="../backend/autenticar.php" method="POST">
            <div class="mb-3">
                <label for="emailLogin" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="emailLogin" placeholder="Digite seu e-mail">
            </div>
            <div class="mb-3">
                <label for="senhaLogin" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" id="senhaLogin" placeholder="Digite sua senha">
            </div>
            <div class="w-100 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
        <div class="text-center mt-2">
            <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalCadastro">Não tem conta? Cadastre-se</a>
        </div>
    </div>


    <div class="container w-25 mt-4">
        <?php if (isset($_SESSION['mensagem'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['mensagem']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
            <?php unset($_SESSION['mensagem']); ?>
        <?php endif; ?>
    </div>


    <!-- Modal de Cadastro -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCadastroLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form action="../backend/cadastrar.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" >
                            <label for="emailCadastro" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" id="emailCadastro" placeholder="Digite seu e-mail" >
                        </div>
                        <div class="mb-3">
                            <label for="senhaCadastro" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senhaCadastro" placeholder="Digite sua senha" >
                        </div>
                        <label for="senhaCadastro" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control" name="confirmarSenha" id="confirmarSenha" placeholder="Confirme sua senha" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>