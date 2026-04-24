<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $quantidade = (int) $_POST['quantidade'];
    $preco = (float) str_replace(',', '.', $_POST['preco']);
    $url = $_POST['url_foto'] ?: 'https://via.placeholder.com/80?text=Sem+Foto';

    $novoItem = [
        'id' => rand(100, 999),
        'nome' => $nome,
        'categoria' => $categoria,
        'quantidade' => $quantidade,
        'preco' => $preco,
        'url_foto' => $url
    ];

    $_SESSION['estoque'][] = $novoItem;

    header("Location: dashboard.php");
    exit();
}