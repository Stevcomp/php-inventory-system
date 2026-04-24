<?php

if (!isset($_SESSION['estoque']) || empty($_SESSION['estoque'])) {
    $_SESSION['estoque'] = [
        [
            'id' => 1,
            'nome' => 'Cimento CP II - 50kg',
            'categoria' => 'Bruto',
            'quantidade' => 65,
            'preco' => 32.90,
            'url_foto' => 'https://cdn.leroymerlin.com.br/products/cimento_todas_as_obras_poty_cpiii_32_50kg_91976101_62c9_600x600.jpg'
        ],
        [
            'id' => 2,
            'nome' => 'Martelo de Unha 25mm Tramontina Cabo em Madeira Envernizada',
            'categoria' => 'Ferramentas',
            'quantidade' => 2,
            'preco' => 45.00,
            'url_foto' => 'https://www.lojaeletrica.com.br/media/catalog/product/2/2/2290103480139_Martelo_de_Unha_25mm_Tramontina_Cabo_em_Madeira_Envernizada_40370X025.JPG?optimize=high&bg-color=255,255,255&fit=bounds&height=642&width=643&canvas=643:642'
        ]
    ];
}

$estoque = $_SESSION['estoque'];

if (isset($_GET['filtro']) && $_GET['filtro'] !== 'todos') {
    $categoriaFiltro = $_GET['filtro'];
    $estoque = array_filter($estoque, function ($item) use ($categoriaFiltro) {
        return strtolower($item['categoria']) === strtolower($categoriaFiltro);
    });
}

if (isset($_GET['busca']) && !empty($_GET['busca'])) {
    $termo = strtolower($_GET['busca']);
    $estoque = array_filter($estoque, function ($item) use ($termo) {
        return strpos(strtolower($item['nome']), $termo) !== false;
    });
}
?>