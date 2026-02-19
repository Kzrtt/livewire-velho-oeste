# Livewire Velho Oeste - Presentation System

## Visao Geral
Sistema de slides para palestra "Livewire, o Inimigo do JavaScript (que virou meu cumplice)" no evento PHP Velho Oeste. O site simula um slide deck completo, permitindo navegacao entre paginas, exibicao de codigo e componentes interativos rodando direto na apresentacao.

## Stack
- **Laravel 12** + **Livewire 4** (multi-file components)
- **Tailwind CSS 4** (via Vite plugin)
- **Alpine.js** (bundled com Livewire)
- **TallStackUI 2.15**
- **Font Awesome Pro 5.15.4** (sempre usar icones **duotone** - prefixo `fad fa-{nome}`, ex: `fad fa-hat-cowboy`)
  - IMPORTANTE: usar nomes FA5, NAO FA6 (ex: `fa-long-arrow-right` nao `fa-arrow-right-long`, `fa-exclamation-triangle` nao `fa-triangle-exclamation`)

## Convencoes de Codigo

### Componentes Livewire
- Usar **multi-file components (MFC)** no padrao Livewire 4 / Volt
- Criar componentes via artisan: `php artisan make:livewire NomeDoComponente --mfc`
- A flag `--mfc` cria uma pasta `⚡nome-do-componente/` contendo `nome-do-componente.php` + `nome-do-componente.blade.php`
- Componentes ficam em `resources/views/components/` (padrao Livewire 4)
- Rotas usam `Route::livewire('/path', 'nome-do-componente')` para full-page components
- **Nomes de arquivos e codigo em ingles** - apenas o conteudo da apresentacao em portugues
- Slides devem ter prefixo numerico para ordenacao: `S01Cover`, `S02AboutMe`, etc.

### Estilizacao
- **Tailwind CSS apenas** - nunca usar CSS direto exceto em ultimo caso
- Paleta de cores principal (tema velho oeste / PHP Velho Oeste):
  - Laranja principal: `#F97316` (orange-500)
  - Laranja escuro: `#EA580C` (orange-600)
  - Laranja queimado: `#C2410C` (orange-700)
  - Amarelo ouro: `#F59E0B` (amber-500)
  - Marrom couro: `#78350F` (amber-900)
  - Fundo escuro: `#1C1917` (stone-900)
  - Fundo medio: `#292524` (stone-800)
  - Texto claro: `#FAFAF9` (stone-50)
  - Texto secundario: `#D6D3D1` (stone-300)
- Fundos dos slides devem ter **figuras geometricas e organicas** com tematica velho oeste
- Minimo de **5 variacoes visuais** diferentes para os backgrounds
- Incluir detalhes de **elefantes** (elePHPant) em alguns slides
- Nem todos os slides devem ter a mesma aparencia

### Navegacao entre Slides
- Cada slide e uma pagina/rota separada
- Navegacao via teclas: `ArrowLeft`/`ArrowRight` e `A`/`D`
- Aproveitar o layout base para nao repetir codigo
- O layout deve conter a logica de navegacao (Alpine.js)
- Design responsivo (mobile-first) - o site sera hospedado e acessivel por celular

### Rotas
- Cada slide deve ter sua propria rota
- Formato sugerido: `/slide/{numero}` ou nomes semanticos
- A rota `/` deve redirecionar para o primeiro slide

### Estrutura de Arquivos
```
resources/views/components/
  slides/⚡s01-cover/        # Componentes Livewire MFC (PHP + Blade na mesma pasta)
    s01-cover.php            # Classe PHP (anonymous class extends Component)
    s01-cover.blade.php      # Template Blade
  backgrounds/               # Background components (Blade anonimos)
  layouts/                   # Layout base com navegacao
config/slides.php            # Mapeamento central dos slides
routes/web.php               # Rotas dos slides (Route::livewire)
```

### Boas Praticas
- Codigo limpo e organizado
- Usar comandos artisan/livewire para criar arquivos
- Componentes pequenos e focados
- Reutilizar layout para logica compartilhada (navegacao, background, etc.)
- Trechos de codigo na apresentacao devem ser exibidos com syntax highlight

## Referencias Importantes
- Newsletter base do conteudo: ver `.claude/references.md`
- Site do evento: ver `.claude/references.md`
- Docs Livewire 4: ver `.claude/references.md`
- Skeleton dos slides: ver `.claude/skeleton.md`
