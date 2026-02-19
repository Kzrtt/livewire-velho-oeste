# Livewire Velho Oeste

Sistema de slides para a palestra **"Livewire, o Inimigo do JavaScript (que virou meu cumplice)"** apresentada no evento [PHP Velho Oeste](https://www.phpvelhoeste.com.br/2025/).

## Demo

[<img src="https://img.youtube.com/vi/eblRwsKyUSA/hqdefault.jpg" width="50%">]([https://youtu.be/eblRwsKyUSA])

https://drive.google.com/file/d/1uWL1NPypg81EPU0tUZoyOnawHKXSF890/view

> Se o video acima nao carregar, veja o arquivo `public/videos/livewire-velho-oeste.mkv` no repositorio.

## Stack

| Tecnologia | Versao |
|---|---|
| Laravel | 12 |
| Livewire | 4 |
| Tailwind CSS | 4 |
| Alpine.js | Bundled com Livewire |
| TallStackUI | 2.15 |
| Font Awesome Pro | 5.15.4 (duotone) |

## Slides

| # | Slide | Background |
|---|---|---|
| 1 | Capa | Horizonte do Deserto |
| 2 | Quem Sou Eu? | ElePHPant Trail |
| 3 | O Inimigo do JavaScript | Horizonte do Deserto |
| 4 | Terreno Firme (Laravel) | Ferrovia do Codigo |
| 5 | 4 Meses de Livewire | ElePHPant Trail |
| 6 | Bastidores: Do wire:* Ate a Requisicao | Circuito do Sertao |
| 7 | O Lado B (Limitacoes) | Tempestade no Canyon |
| 8 | Livewire 4 (Transicao) | Horizonte do Deserto |
| 9 | Blaze | Ferrovia do Codigo |
| 10 | Single-File Components / MFC | Circuito do Sertao |
| 11 | Nova API Frontend (this.) | ElePHPant Trail |
| 12 | Islands | Tempestade no Canyon |
| 13 | SPA-Like Nativo | Ferrovia do Codigo |
| 14 | Raio X WebNews | Circuito do Sertao |
| 15 | Minha Visao Enviesada | Horizonte do Deserto |
| 16 | Creditos e Agradecimentos | Por do Sol Final |

## Backgrounds

O projeto possui 6 backgrounds tematicos feitos inteiramente com Tailwind CSS:

- **Horizonte do Deserto** - Gradiente laranja com montanhas geometricas, sol dourado e cactos
- **ElePHPant Trail** - Silhuetas de elefantes PHP, dunas e nuvens
- **Ferrovia do Codigo** - Trilhos em perspectiva convergente com postes de telegrafo
- **Circuito do Sertao** - Linhas de circuito com nos brilhantes em laranja
- **Tempestade no Canyon** - Tons escuros dramaticos com raios de luz laranja
- **Por do Sol Final** - Por do sol dramatico com estrelas, elefantes em silhueta e raios irradiando

## Estrutura do Projeto

```
resources/views/components/
  slides/
    ⚡s01-cover/              # Cada slide e um MFC (Multi-File Component)
      s01-cover.php           # Classe PHP (anonymous class)
      s01-cover.blade.php     # Template Blade
    ⚡s02-about-me/
    ...
    ⚡s16-credits/
  backgrounds/                # Backgrounds reutilizaveis (Blade anonimos)
  layouts/
    presentation.blade.php    # Layout com navegacao, progresso e transicoes
config/slides.php             # Mapeamento central: slide -> componente + background
routes/web.php                # Rotas usando Route::livewire()
```

## Navegacao

- **Teclado**: `ArrowRight` / `D` (proximo) e `ArrowLeft` / `A` (anterior)
- **Touch**: Swipe esquerda/direita (mobile)
- **Botoes**: Setas nas laterais da tela
- **Barra de progresso**: Exibida no rodape com contador de slides

A navegacao entre slides utiliza o **SPA-Like nativo** do Livewire 4 - sem reload de pagina.

## Como Rodar

```bash
# Instalar dependencias
composer install
npm install

# Iniciar servidores
php artisan serve
npm run dev
```

Acesse `http://localhost:8000` e a apresentacao redireciona automaticamente para o primeiro slide.

## Autor

**Felipe Kurt Pohling** - Criador do [WebNews](https://webnews.dev.br)
