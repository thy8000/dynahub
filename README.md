# Dynahub WordPress Theme

Tema WordPress moderno e performático construído com Tailwind CSS v4.1 e Vite.

## 🚀 Características

- **Tailwind CSS v4.1** - Configuração CSS-first com `@theme`
- **Vite** - Build tool moderna com HMR (Hot Module Replacement)
- **ES Modules** - JavaScript modular nativo
- **Performance** - Minificação automática em produção
- **Live Reload** - Desenvolvimento com atualização automática

## 📦 Instalação

1. Clone ou baixe o tema na pasta `wp-content/themes/` do seu WordPress
2. Instale as dependências:

```bash
npm install
```

## 🛠️ Desenvolvimento

Para iniciar o servidor de desenvolvimento com live reload:

```bash
npm run dev
```

O servidor Vite estará rodando em `http://localhost:3000`

**Importante**: Certifique-se de que o WordPress está configurado com `WP_DEBUG` definido como `true` no `wp-config.php` para usar o modo de desenvolvimento.

## 🏗️ Build para Produção

Para gerar os arquivos otimizados para produção:

```bash
npm run build
```

Os arquivos compilados estarão na pasta `/dist`.

**Importante**: Antes de fazer deploy, defina `WP_DEBUG` como `false` no `wp-config.php` para usar os arquivos compilados.

## 📁 Estrutura do Tema

```
dynahub/
├── src/                    # Arquivos fonte
│   ├── input.css          # Estilos Tailwind
│   ├── main.js            # JavaScript principal
│   └── modules/           # Módulos JavaScript
│       ├── navigation.js
│       └── theme.js
├── dist/                   # Arquivos compilados (gerado)
├── functions.php          # Funções do tema
├── index.php              # Template principal
├── header.php             # Cabeçalho
├── footer.php             # Rodapé
├── style.css              # Arquivo de identificação do tema
├── vite.config.js         # Configuração do Vite
└── package.json           # Dependências npm
```

## 🎨 Configuração do Tailwind

O Tailwind CSS v4.1 utiliza configuração CSS-first através da diretiva `@theme` no arquivo `src/input.css`. Você pode personalizar cores, fontes, espaçamentos e outros tokens diretamente no CSS.

## 📝 Notas Importantes

- O tema diferencia automaticamente entre ambiente de desenvolvimento e produção através da constante `WP_DEBUG`
- Em desenvolvimento, os arquivos são carregados do servidor Vite (`localhost:3000`)
- Em produção, os arquivos são carregados da pasta `/dist` com minificação aplicada
- O JavaScript utiliza `type="module"` para suporte a ES Modules nativo

## 🔧 Requisitos

- WordPress 6.0+
- PHP 8.0+
- Node.js 18+ e npm

## 📄 Licença

GPL v2 ou posterior
