# Skeleton da Apresentacao

**Titulo:** Livewire, o Inimigo do JavaScript (que virou meu cumplice)
**Subtitulo/Tema:** Livewire Velho Oeste
**Evento:** PHP Velho Oeste
**Palestrante:** Felipe Kurt Pohling

---

## Slide 1 - Capa
- Titulo: "Livewire, o Inimigo do JavaScript (que virou meu cumplice)"
- Subtitulo: "Livewire Velho Oeste"
- Nome do palestrante
- Logo/referencia ao PHP Velho Oeste
- Visual impactante com tematica velho oeste
- **Background: Variacao 1** - paisagem deserto com formas geometricas, tons de laranja quente

## Slide 2 - Quem Sou Eu?
- Apresentacao pessoal do Felipe Kurt Pohling
- Foto/avatar
- Links sociais/profissionais
- Breve contexto: criador da WebNews, dev PHP/Laravel
- Mencao a experiencia com Livewire
- **Background: Variacao 2** - formas organicas com silhueta de elefante (elePHPant)

## Slide 3 - O Inimigo do JavaScript
- Contexto: por que "inimigo"?
- A proposta do Livewire: reatividade sem JavaScript extenso
- Como e possivel criar telas reativas no PHP
- Conteudo da newsletter: "experiencia construindo o WebNews sem framework JavaScript no frontend"
- **Background: Variacao 1**

## Slide 4 - Laravel, Terreno Firme para Correr
- Apresentar os 3 pilares relevantes:
  - **Eloquent**: ORM, models, relacoes, Auth
  - **Rotas**: web.php, Route facade, middlewares
  - **Jobs**: Queue workers, Scheduler
- Mostrar que o Laravel fornece a base solida para o Livewire funcionar
- Trechos de codigo ilustrativos
- **Background: Variacao 3** - geometria angular com linhas de trilhos de trem

## Slide 5 - 4 Meses de Livewire
- Experiencia pratica com Livewire no WebNews
- Diretivas principais com exemplos visuais:
  - `wire:model` - sincronizacao de dados
  - `wire:click` - acoes no backend
  - `wire:loading` - estados de carregamento
- Mostrar como funciona o ciclo de requisicao
- **Background: Variacao 2**

## Slide 6 - Bastidores: Do wire:* Ate a Requisicao
- Diagrama/fluxo visual do ciclo Livewire:
  1. Cliente: Snapshot + fila de acoes
  2. Servidor: Re-hidratacao, syncInput, callMethod
  3. Resposta: HTML novo + efeitos + snapshot atualizado
  4. DOM: Morph (diff) no subarvore
- Exemplo de componente rodando ao vivo na apresentacao
- **Background: Variacao 4** - circuitos/linhas conectadas (representando o fluxo de dados)

## Slide 7 - O Lado B...
- Limitacoes honestas do Livewire:
  - "Paginas tudo ao mesmo tempo agora" - multiplos componentes = lentidao
  - Microinteracoes visuais - Alpine.js e melhor
  - JS rico (canvas, WYSIWYG) - precisa de JavaScript puro
- Regra pratica: "Blade + Livewire quando possivel; JavaScript para UI pesada"
- **Background: Variacao 5** - tons mais escuros, silhueta de tempestade no deserto

## Slide 8 - Livewire 4: Menos Friccao + Mais Desempenho
- Slide de transicao/titulo para a secao do Livewire 4
- **Background: Variacao 1** - versao especial, mais vibrante

## Slide 9 - Blaze
- O que e o Blaze
- Como otimiza render de partes estaticas
- Economia de processamento
- Exemplo comparativo antes/depois
- **Background: Variacao 3**

## Slide 10 - Single-File Components
- Padrao Volt: unico arquivo em vez de separar PHP/Blade
- Exemplo de codigo side-by-side (multi-file vs single-file)
- Vantagens para organizacao do codebase
- **Background: Variacao 4**

## Slide 11 - Nova API para Frontend
- `this.` em lugar de `$wire`
- Sintaxe mais familiar para devs frontend
- Exemplos de codigo com a nova API
- **Background: Variacao 2**

## Slide 12 - Fim do $wire + Islands
- Remocao do `$wire` - simplificacao
- Islands: isolacao de blocos caros\
- Lazy loading nativo com `@islands`
- Exemplo pratico de uso
- **Background: Variacao 5**

## Slide 13 - SPA-Like Nativo
- Navegacao sem recarregar pagina
- Experiencia de Single Page Application no Livewire
- Demonstracao ao vivo (o proprio site da apresentacao pode servir como exemplo)
- **Background: Variacao 3**

## Slide 14 - Raio X WebNews
- Como o WebNews vai se beneficiar do Livewire 4
- Plano de migracao:
  1. Mapear areas com engasgos
  2. Aplicar @islands para desempenho
  3. Ajustar controladores para padrao Volt
  4. Aplicar tipagem ao codigo
- Dados reais do projeto
- **Background: Variacao 4**

## Slide 15 - Minha Visao Enviesada...
- "Sem o Livewire eu nao teria lugar nenhum pra escrever esse texto"
- Mudanca paradigmatica do PHP com Laravel
- Livewire 4 como melhor momento para adocao
- Frase de fechamento: "Se o Livewire comecou como inimigo do JavaScript, ele terminou virando meu cumplice: eu so chamo JS quando ele e a melhor ferramenta, nao por inercia."
- **Background: Variacao 1** - versao sunset/por-do-sol

## Slide 16 - Creditos e Agradecimentos
- Creditos:
  - Laravel News — Everything We Know About Livewire 4
  - DevDojo (Tony Lea) — Livewire 4: The Future of PHP Components
  - Laracon/YouTube — Why this new Livewire version changes everything
- Agradecimento ao PHP Velho Oeste
- QR Code ou link para o site da apresentacao
- Redes sociais para contato
- "Livewire Velho Oeste" como marca da apresentacao
- **Background: Variacao 5** - versao especial de encerramento, com elePHPant

---

## Variacoes de Background

### Variacao 1 - "Horizonte do Deserto"
- Gradiente de laranja para marrom escuro
- Formas geometricas angulares simulando montanhas/mesa (landforms do deserto)
- Sol/circulo dourado como elemento focal
- Particulas de poeira sutis

### Variacao 2 - "ElePHPant Trail"
- Fundo stone-900 com overlay sutil
- Silhuetas de elefantes (elePHPant) como elementos decorativos
- Formas organicas onduladas (dunas de areia)
- Detalhes em amber/dourado

### Variacao 3 - "Ferrovia do Codigo"
- Linhas retas paralelas (trilhos) convergindo em perspectiva
- Formas geometricas angulares (vagonetes, estacoes)
- Tons de laranja com contraste em marrom escuro
- Sensacao de direcao/progresso

### Variacao 4 - "Circuito do Sertao"
- Linhas conectadas formando padroes de circuito/fluxo
- Nos/pontos destacados em laranja brilhante
- Background escuro com elementos tecnologicos mesclados com organicos
- Representacao visual de dados fluindo

### Variacao 5 - "Tempestade no Canyon"
- Tons mais escuros e dramaticos
- Formas organicas de nuvens/tempestade
- Raios de luz em laranja cortando o escuro
- Textura rochosa sutil no fundo
