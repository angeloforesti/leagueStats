<?php
require_once 'scripts/connection.php';

//processamento dos dados do formulário de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Consulta SQL para verificar as credenciais de login
    $sql = "SELECT * FROM cad_usuarios WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);

    // Verifica se a consulta retornou algum resultado
    if (mysqli_num_rows($result) == 1) {
        // Autenticação bem-sucedida, define a sessão do usuário
        session_start();
        $_SESSION["username"] = $username;

        // Redireciona o usuário para a página de boas-vindas ou outra página protegida
        header("location: leagueStats.php");
        exit();
    } else {
        // Autenticação falhou, exibe mensagem de erro
        $error = "Nome de usuário ou senha incorretos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.css">
    <title>Login</title>
    <style> body{color: #fff;} </style>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <form method="post" action="">
                    <h2 class="mb-4">Login</h2>
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de usuário</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Entrar</button>
                    <a href="index.php" class="btn btn-secondary">cadastrar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
