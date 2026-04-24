# ConstruTech-stock-menager

🔧 ConstruTech - Stock Manager
Sistema inteligente de gestão de inventário para materiais de construção.

O ConstruTech é uma aplicação Full-Stack desenvolvida para simplificar o controlo de stock. O foco do projeto foi criar uma interface intuitiva que oferece feedback em tempo real sobre a saúde do inventário, utilizando uma lógica de "semáforo" para sinalizar a necessidade de reposição.

🚀 Funcionalidades Principais
- Autenticação de Utilizador: Sistema de login seguro com proteção de rotas via Sessões PHP. Dashboard Dinâmico: Visualização de produtos com filtros por categoria (Bruto, Ferramentas, Acabamento).
- Gestão de Inventário (CRUD):
- Registo de novos produtos com geração de ID único.
- Controlo rápido de stock (Incremento/Decremento via AJAX-style links).
- Remoção definitiva de itens.
- Inteligência de Negócio:
- Alertas Visuais: Mudança de cor automática (Verde, Amarelo, Vermelho) baseada na quantidade disponível.
- Cálculo de Património: Soma automatizada do valor total em stock (Preço x Quantidade).
- Log de Atividades: Registo de histórico de ações recentes do utilizador.

🛠️ Tecnologias Utilizadas
- Linguagem: PHP 7.4+ (Lógica de servidor e gestão de sessões).
- Estilização: CSS3 puro (Variáveis CSS, Flexbox e CSS Grid).
- Ícones: FontAwesome 6.
- Armazenamento: PHP Sessions (Persistência temporária de dados).

📁 Estrutura do Projeto
Bash
├── index.php                # Tela de Login
├── ReceberCadastro.php      # Validação de acesso
├── dashboard.php            # Painel principal e listagem
├── acao.php                 # Motor de lógica (add, sub, del)
├── processa_cadastro.php    # Lógica de criação de novos itens
├── logout.php               # Encerramento de sessão
└── style.css                # Identidade visual e responsividade

⚙️ Como Executar o Projeto
- Certifique-se de ter um servidor local instalado (ex: XAMPP, WAMP ou Laragon).
- Clone este repositório para a pasta htdocs do seu servidor:
- Bash
- git clone https://github.com/seu-utilizador/construtech-stock-manager.git
- Inicie o Apache no seu painel de controlo do servidor local.
- Va até seu navegador e digite: http://localhost/construtech-stock-manager

🎨 Interface Visual
- O projeto utiliza um tema Dark Mode moderno, focado na redução da fadiga visual para o operador, com bordas coloridas dinâmicas:
🔴 Borda Vermelha: Stock Crítico (≤ 14 unidades).
🟡 Borda Amarela: Atenção (15 a 34 unidades).
🟢 Borda Verde: Stock Adequado (≥ 35 unidades).

- Desenvolvido por Felipe Stevanato Ribeiro - Conecte-se comigo nesse número +55 11 97756-9063.
