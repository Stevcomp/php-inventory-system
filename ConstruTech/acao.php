<?php
session_start();

$id = $_GET['id'];
$operacao = $_GET['op'];

foreach ($_SESSION['estoque'] as $key => $produto) {
    if ($produto['id'] == $id) {
        if ($operacao == 'add') {
            $_SESSION['estoque'][$key]['quantidade']++;
        } elseif ($operacao == 'sub') {
            if ($_SESSION['estoque'][$key]['quantidade'] > 0) {
                $_SESSION['estoque'][$key]['quantidade']--;
            }
        } elseif ($operacao == 'del') {
            unset($_SESSION['estoque'][$key]);
        }
        break;
    }
}

header("Location: dashboard.php#prod-" . $id);
exit();