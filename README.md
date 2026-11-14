# GameVault

GameVault é um e-commerce de chaves digitais de jogos da Steam, na sua primeira versão funcional.

## Tecnologias

- HTML5, CSS3, Bootstrap, JavaScript
- PHP 8.x
- MySQL/MariaDB (para futuras versões)

## Funcionalidades já implementadas

- Página inicial com catálogo de jogos em destaque.
- Busca por nome e filtro por categoria.
- Detalhes do produto.
- Carrinho de compras usando sessões PHP.
- Checkout simulado.

## Como executar localmente (XAMPP)

1. Copie a pasta `GameVault` para `C:\xampp\htdocs\`.
2. Inicie o Apache via Painel de Controle do XAMPP.
3. Abra o navegador e acesse: `http://localhost/GameVault/public/`.

## Banco de dados

Importe o arquivo `gamevault.sql` pelo phpMyAdmin. A conexão com o MySQL está configurada em `src/config.php`. Se o MySQL usar usuário ou senha diferentes, ajuste `DB_USER` e `DB_PASS` nesse arquivo.
