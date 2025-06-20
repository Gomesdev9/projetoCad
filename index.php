<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bem-vindo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .welcome-container {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 20px;
    }

    .welcome-title {
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: #343a40;
    }

    .welcome-subtitle {
      font-size: 1.2rem;
      color: #6c757d;
      margin-bottom: 2rem;
    }

    .btn-custom {
      padding: 0.75rem 2rem;
      font-size: 1rem;
    }
  </style>
</head>
<body>

  <div class="welcome-container">
    <h1 class="welcome-title">Bem-vindo ao Sistema</h1>
    <p class="welcome-subtitle">Cadastre-se para começar sua jornada conosco.</p>
    <a href="./src/pages/cadastro.php" class="btn btn-primary btn-custom">Ir para Cadastro</a>
  </div>

</body>
</html>
