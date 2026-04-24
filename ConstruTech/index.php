<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConstruTech 🔧 | Sistema de Gerenciamento - Login</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" type="image/png" href="./Imagens/Icone.png">
</head>

<body>

    <?php
    if (isset($_GET['erro']) && $_GET['erro'] == 1) {
        echo '<div class="error-banner">
                    ⚠️ Informações incorretas! Por favor, verifique os dados de login.
                </div>';
    }
    ?>

    <header class="main-header">
        <div class="header-container">
            <div class="logo-area">
                <h1>ConstruTech 🔧</h1>
                <p>Sistema de organização e controle | Gestão de Estoque</p>
            </div>
        </div>
    </header>

    <div class="container">

        <div class="box">
            <h1>Faça Seu Login Para Acessar Nosso Sistema</h1>

            <form method="POST" action="ReceberCadastro.php" autocomplete="off">

                <input type="text" placeholder="Nome completo" name="usuario" required>
                <!-- Vicente Stevanato de Sousa -->
                <input type="text" placeholder="@Contato" name="contato" required> <!-- vicenteSS@gmail.com -->
                <input type="text" placeholder="CPF" name="cpf" required> <!-- 123.456.789-10 -->
                <input type="password" placeholder="Senha" name="senha" required> <!-- 2469 -->

                <button type="submit">Entrar</button>
            </form>

        </div>

    </div>

</body>

</html>