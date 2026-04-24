<?php
session_start();


$usuario_oficial = "Vicente Stevanato de Sousa";
$contato_oficial = "vicenteSS@gmail.com";
$cpf_oficial = "123.456.789-10";
$senha_oficial = "2469";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario_digitado = $_POST['usuario'];
    $contato_digitado = $_POST['contato'];
    $cpf_digitado = $_POST['cpf'];
    $senha_digitada = $_POST['senha'];


    if (
        $usuario_oficial === $usuario_digitado &&
        $contato_oficial === $contato_digitado &&
        $cpf_oficial === $cpf_digitado &&
        $senha_oficial === $senha_digitada
    ) {

        $_SESSION['logado'] = true;
        $_SESSION['nome'] = $usuario_oficial;

        header("Location: dashboard.php");
        exit;

    } else {
        header("Location: index.php?erro=1");
        exit;
    }
}
?>