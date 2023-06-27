<?php
require_once 'connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];


    $sql = "INSERT INTO cad_usuarios (id, username, password, email) VALUES (NULL, 
    '$username', '$password', '$email')";


    if (mysqli_query($conn, $sql)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . mysqli_error($conn);

    }
} else {
    echo "O formulário não foi submetido.";
}

header("location: ../login.php");
?>
