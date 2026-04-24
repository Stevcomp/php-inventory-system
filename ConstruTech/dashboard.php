<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

require_once 'lista_produtos/dados.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConstruTech 🔧 | Painel de Controle</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <header class="main-header">
        <div class="header-container">
            <div class="logo-area">
                <h1>ConstruTech 🔧</h1>
                <p>Bem-vindo, <strong><?php echo $_SESSION['nome']; ?></strong></p>
            </div>
            <a href="logout.php" class="btn-logout" style="color: #f44336; font-weight: bold; text-decoration: none;">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </header>

    <main class="content-wrapper">
        <section class="cadastro-container">
            <h2>Cadastrar Novo Item</h2>
            <form action="processa_cadastro.php" method="POST" class="form-cadastro-inline">
                <div class="form-group campo-nome">
                    <label>Nome do Produto:</label>
                    <input type="text" name="nome" placeholder="Ex: Cimento CP II" required>
                </div>

                <div class="form-group campo-categoria">
                    <label>Categoria:</label>
                    <select name="categoria" required>
                        <option value="Bruto">Materiais Brutos</option>
                        <option value="Ferramentas">Ferramentas</option>
                        <option value="Acabamento">Acabamento</option>
                    </select>
                </div>

                <div class="form-group campo-quantidade">
                    <label>Qtd.</label>
                    <input type="number" name="quantidade" placeholder="0" required min="0">
                </div>

                <div class="form-group campo-preco">
                    <label>Preço (R$)</label>
                    <input type="text" name="preco" placeholder="0.00" required>
                </div>

                <div class="form-group campo-url">
                    <label>URL da Foto</label>
                    <input type="url" name="url_foto" placeholder="http://..." required>
                </div>

                <button type="submit" class="btn-adicionar">Adicionar Item</button>
            </form>
        </section>

        <hr style="border: 0; border-top: 3px solid #333; margin: 30px 0;">

        <section class="controle-container">
            <div class="filtros-area">
                <span>Filtrar:</span>
                <div class="botoes-filtros">
                    <?php
                    $f = $_GET['filtro'] ?? 'todos';
                    foreach (['todos', 'bruto', 'ferramentas', 'acabamento'] as $tipo): ?>
                        <a href="dashboard.php?filtro=<?php echo $tipo; ?>"
                            class="btn-filtro <?php echo ($f == $tipo) ? 'active' : ''; ?>">
                            <?php echo ucfirst($tipo); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="inventario-container">
            <div class="produtos-grid">
                <?php if (!empty($estoque)): ?>
                    <?php foreach ($estoque as $produto):
                        if ($produto['quantidade'] <= 14) {
                            $statusClass = 'critico';
                            $statusMsg = 'Estoque Baixo';
                        } elseif ($produto['quantidade'] <= 34) {
                            $statusClass = 'alerta';
                            $statusMsg = 'Estoque Médio';
                        } else {
                            $statusClass = 'adequado';
                            $statusMsg = 'Estoque Adequado';
                        }
                        ?>
                        <div class="produto-card <?php echo $statusClass; ?>">
                            <div class="card-acoes">
                                <a href="acao.php?id=<?php echo $produto['id']; ?>&op=add" class="btn-acao"><i
                                        class="fas fa-plus"></i></a>
                                <a href="acao.php?id=<?php echo $produto['id']; ?>&op=sub" class="btn-acao"><i
                                        class="fas fa-minus"></i></a>
                                <a href="acao.php?id=<?php echo $produto['id']; ?>&op=del" class="btn-acao"
                                    style="color:#f44336"><i class="fas fa-trash"></i></a>
                            </div>

                            <div class="produto-foto-area">
                                <img src="<?php echo $produto['url_foto'] ?: 'https://via.placeholder.com/150'; ?>"
                                    class="produto-foto">
                            </div>

                            <div class="produto-info-area">
                                <div class="produto-header-info">
                                    <span class="produto-categoria"><?php echo $produto['categoria']; ?></span>
                                </div>

                                <h4 class="produto-nome"><?php echo $produto['nome']; ?></h4>

                                <div class="produto-status">
                                    <span class="status-badge badge-<?php echo $statusClass; ?>">
                                        <?php echo $statusMsg; ?>
                                    </span>
                                </div>

                                <div class="produto-dados">
                                    <div class="dado-item">
                                        <span>Qtd:</span>
                                        <span class="valor-destaque"><?php echo $produto['quantidade']; ?> un</span>
                                    </div>
                                    <div class="dado-item">
                                        <span>Total:</span>
                                        <span class="dado-valor">R$
                                            <?php echo number_format($produto['quantidade'] * $produto['preco'], 2, ',', '.'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align:center; grid-column: 1/-1;">Nenhum item encontrado.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php
    $totalGeral = array_sum(array_map(function ($i) {
        return $i['quantidade'] * $i['preco']; }, $_SESSION['estoque']));
    $itensRepor = count(array_filter($_SESSION['estoque'], function ($i) {
        return $i['quantidade'] <= 14; }));
    ?>
    <footer class="rodape-status">
        <div class="status-container">
            <span><i class="fas fa-info-circle"></i> ConstruTech v1.0 | <span
                    class="alerta-texto"><?php echo $itensRepor; ?> itens em nível crítico.</span></span>
            <div class="status-financeiro">
                PATRIMÔNIO TOTAL: <span class="valor-total-destaque">R$
                    <?php echo number_format($totalGeral, 2, ',', '.'); ?></span>
            </div>
        </div>
    </footer>
</body>

</html>