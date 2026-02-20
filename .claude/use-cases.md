# Guia de Casos de Uso Interativos nos Slides

## Visao Geral

Cada slide elegivel tera um botao no canto superior direito para alternar entre o **conteudo da apresentacao** e o **caso de uso interativo**. O caso de uso mantem o background e identidade visual do slide, mudando apenas o conteudo central. Alem disso, cada caso de uso tera um botao para exibir o codigo-fonte completo (PHP + Blade) diretamente na tela.

---

## Tema Unificado: "Gestao da Cidade do Velho Oeste"

Todos os casos de uso compartilham um universo tematico: uma cidade ficticia do velho oeste com bandidos, um saloon e eventos na cidade. Isso mantem a coerencia visual da apresentacao e permite reutilizar tabelas entre slides.

### Convencao de Nomenclatura de Colunas

**REGRA:** Todas as colunas devem ter um prefixo que remete ao nome da tabela.
- `gangs` → prefixo `gng_`
- `outlaws` → prefixo `otl_`
- `horses` → prefixo `hrs_`
- `bounty_hunters` → prefixo `bht_`
- `saloon_drinks` → prefixo `sdk_`
- `saloon_orders` → prefixo `sor_`
- `sheriff_reports` → prefixo `shr_`
- `town_events` → prefixo `tev_`

Exemplo: `outlaws.otl_id`, `outlaws.otl_gang_id`, `saloon_orders.sor_drink_id`, etc.

### Diagrama de Relacionamentos

```
gangs (1)──────(N) outlaws (1)──────(N) horses
                     │
                     ├──(N) saloon_orders (N)──(1) saloon_drinks
                     │
                     └──(N) sheriff_reports
                                │
bounty_hunters (1)──────────────┘

town_events (standalone, refs outlaw_id nullable)
```

### Tabelas do Banco de Dados

#### `gangs` (Gangues) — ~8 registros
| Coluna | Tipo | Descricao |
|--------|------|-----------|
| gng_id | bigint (PK) | |
| gng_name | string | Nome da gangue (ex: "Serpentes do Deserto") |
| gng_territory | string | Territorio dominado |
| gng_reputation | tinyint (1-10) | Fama/reputacao |
| gng_active | boolean default true | Se ainda esta ativa |
| gng_created_at | timestamp | |
| gng_updated_at | timestamp | |

#### `outlaws` (Bandidos) — ~30 registros
| Coluna | Tipo | Descricao |
|--------|------|-----------|
| otl_id | bigint (PK) | |
| otl_gang_id | bigint (FK nullable) | Gangue (ref gangs.gng_id) |
| otl_name | string | Nome completo |
| otl_alias | string | Apelido (ex: "O Pistoleiro") |
| otl_bounty | decimal(10,2) | Recompensa em dolares |
| otl_crime | string | Crime cometido |
| otl_status | enum: wanted, captured, escaped | Situacao atual |
| otl_danger_level | tinyint (1-5) | Nivel de periculosidade |
| otl_last_seen_at | datetime nullable | Ultimo avistamento |
| otl_created_at | timestamp | |
| otl_updated_at | timestamp | |

#### `horses` (Cavalos) — ~45 registros
| Coluna | Tipo | Descricao |
|--------|------|-----------|
| hrs_id | bigint (PK) | |
| hrs_outlaw_id | bigint (FK nullable) | Dono (ref outlaws.otl_id) |
| hrs_name | string | Nome do cavalo |
| hrs_breed | string | Raca (Mustang, Quarter Horse, Appaloosa, etc.) |
| hrs_color | string | Cor (bayo, alazao, preto, pintado, etc.) |
| hrs_speed | tinyint (1-10) | Velocidade |
| hrs_stolen | boolean default false | Se foi roubado |
| hrs_created_at | timestamp | |
| hrs_updated_at | timestamp | |

#### `bounty_hunters` (Cacadores de Recompensa) — ~15 registros
| Coluna | Tipo | Descricao |
|--------|------|-----------|
| bht_id | bigint (PK) | |
| bht_name | string | Nome completo |
| bht_alias | string nullable | Apelido |
| bht_success_rate | decimal(5,2) | Taxa de sucesso (%) |
| bht_captures | int default 0 | Total de capturas |
| bht_active | boolean default true | Se esta ativo |
| bht_created_at | timestamp | |
| bht_updated_at | timestamp | |

#### `saloon_drinks` (Cardapio do Saloon) — ~20 registros
| Coluna | Tipo | Descricao |
|--------|------|-----------|
| sdk_id | bigint (PK) | |
| sdk_name | string | Nome da bebida |
| sdk_type | enum: whiskey, beer, wine, coffee, other | Categoria |
| sdk_price | decimal(8,2) | Preco |
| sdk_alcoholic | boolean | Se e alcoolica |
| sdk_available | boolean default true | Disponivel |
| sdk_created_at | timestamp | |
| sdk_updated_at | timestamp | |

#### `saloon_orders` (Pedidos do Saloon) — ~500 registros
| Coluna | Tipo | Descricao |
|--------|------|-----------|
| sor_id | bigint (PK) | |
| sor_outlaw_id | bigint (FK nullable) | Quem pediu (ref outlaws.otl_id) |
| sor_drink_id | bigint (FK) | Bebida pedida (ref saloon_drinks.sdk_id) |
| sor_customer_name | string nullable | Nome se nao for outlaw |
| sor_quantity | int | Quantidade |
| sor_total_price | decimal(8,2) | Preco total calculado |
| sor_status | enum: pending, preparing, served, paid | Status do pedido |
| sor_notes | text nullable | Observacoes |
| sor_created_at | timestamp | |
| sor_updated_at | timestamp | |

#### `sheriff_reports` (Relatorios do Xerife) — ~800 registros
| Coluna | Tipo | Descricao |
|--------|------|-----------|
| shr_id | bigint (PK) | |
| shr_outlaw_id | bigint (FK nullable) | Bandido envolvido (ref outlaws.otl_id) |
| shr_hunter_id | bigint (FK nullable) | Cacador responsavel (ref bounty_hunters.bht_id) |
| shr_title | string | Titulo do relatorio |
| shr_description | text | Descricao detalhada |
| shr_type | enum: sighting, capture, escape, incident, patrol | Tipo |
| shr_location | string | Local da ocorrencia |
| shr_resolved | boolean default false | Se foi resolvido |
| shr_reported_at | datetime | Data do relatorio |
| shr_created_at | timestamp | |
| shr_updated_at | timestamp | |

#### `town_events` (Eventos na Cidade) — ~2000 registros
| Coluna | Tipo | Descricao |
|--------|------|-----------|
| tev_id | bigint (PK) | |
| tev_outlaw_id | bigint (FK nullable) | Bandido envolvido (ref outlaws.otl_id) |
| tev_title | string | Titulo do evento |
| tev_description | text | Descricao detalhada |
| tev_type | enum: robbery, duel, arrival, party, escape | Tipo |
| tev_location | string | Local (saloon, banco, estabulo, etc.) |
| tev_severity | enum: low, medium, high, critical | Gravidade |
| tev_resolved | boolean default false | Se foi resolvido |
| tev_happened_at | datetime | Quando aconteceu |
| tev_created_at | timestamp | |
| tev_updated_at | timestamp | |

### Migrations
Todas as tabelas DEVEM ser criadas via `php artisan make:migration`. Nunca criar tabelas manualmente.

### Seeders
Cada tabela DEVE ter um seeder com dados tematicos pre-populados.

**Quantidades de registros por tabela:**
| Tabela | Quantidade | Proposito no Demo |
|--------|-----------|-------------------|
| `gangs` | **~8** | Dados de referencia, agrupamento |
| `outlaws` | **~30** | Protagonistas, volume leve |
| `horses` | **~45** | Relacionamento 1:N com outlaws |
| `bounty_hunters` | **~15** | Personagens secundarios |
| `saloon_drinks` | **~20** | Cardapio fixo do saloon |
| `saloon_orders` | **~500** | Volume medio — island moderada |
| `sheriff_reports` | **~800** | Volume medio-alto — queries com joins |
| `town_events` | **~2000** | Volume pesado — island mais lenta |

Essa diferenca de volume e **intencional**: no demo de Islands (slide 12), cada widget faz queries em tabelas com quantidades drasticamente diferentes, mostrando que cada island carrega independentemente e o tempo depende da complexidade real da query, nao de delays artificiais.

---

## Mecanica do Toggle Conteudo/Caso de Uso

### Botao Toggle (canto superior direito)
- Icone: `fad fa-flask` (conteudo) / `fad fa-long-arrow-left` (caso de uso)
- Texto: "Ver Demo" / "Voltar"
- Posicao: `fixed top-4 right-4 z-50`
- Estilo: Botao com fundo semi-transparente, borda laranja, hover com glow
- Implementacao: propriedade Livewire `$showUseCase = false` no componente do slide

### Botao "Ver Codigo" (dentro do caso de uso)
- Aparece somente quando `$showUseCase = true`
- Icone: `fad fa-code`
- Abre um overlay/modal fullscreen com syntax highlight
- Mostra o codigo PHP e Blade do caso de uso (lido diretamente dos arquivos via `file_get_contents`)
- Implementacao: propriedade Livewire `$showCode = false`
- O codigo sera exibido com highlight usando uma abordagem simples de classes CSS (pre-formatado com cores por token type)

### Transicao
- Transicao suave entre conteudo e caso de uso usando Alpine.js (`x-transition` ou `x-show` com fade)
- O background do slide permanece inalterado durante o toggle

---

## Slides com Casos de Uso

---

### Slide 5 — "4 Meses de Livewire" (Directives Showcase) ✅ IMPLEMENTADO
**Componente:** `wanted-board` (MFC em `resources/views/components/⚡wanted-board/`)

#### Status: Completo
Implementado como componente Livewire separado, nested no slide 5 via `@livewire('wanted-board')`.

#### Arquitetura
- **Toggle:** Alpine.js (`x-data="{ showDemo: false }"`) — sem round-trip ao servidor
- **Navegacao:** Layout recebe `$dispatch('slide-navigation')` para desabilitar setas/A/D/swipe durante o demo
- **Code Viewer:** Modal Alpine.js com `x-teleport="body"`, tabs PHP/Blade, syntax highlight manual
- **Badges:** Labels `absolute` com `bg-orange-500/20 text-orange-400 text-[10px] font-mono` em cada elemento interativo

#### Diretivas Demonstradas
| Diretiva | Elemento | Comportamento |
|----------|----------|---------------|
| `wire:model.live` | Campo de busca | Filtra outlaws em tempo real (debounce 300ms) |
| `wire:model` | Select de filtro | Filtra por status (wanted/captured/escaped) |
| `wire:click` | Botoes Capturar/Soltar | Muda status do outlaw no banco |
| `wire:loading` | Spinner nos botoes | Aparece durante delay artificial de 600ms |
| `wire:confirm` | Botao Soltar | Dialogo de confirmacao antes de liberar bandido |
| `wire:dirty` | Input de edicao de recompensa | Badge "Alterado" + borda amarela |
| `wire:poll.5s` | Contador de avistamentos | Incrementa automaticamente a cada 5s |
| `wire:key` | Cada card de outlaw | Key unica para morph eficiente no `@foreach` |
| `wire:transition` | Cards | Animacao ao entrar/sair da lista filtrada |

#### Tabelas Envolvidas
- `outlaws` (com eager loading de `gangs` via `with('gang')`)

#### Arquivos
- `resources/views/components/⚡wanted-board/wanted-board.php` — Classe PHP
- `resources/views/components/⚡wanted-board/wanted-board.blade.php` — Template Blade
- `resources/views/components/slides/⚡s05-four-months/s05-four-months.blade.php` — Modificado (toggle + nested)
- `resources/views/components/layouts/presentation.blade.php` — Modificado (navigationEnabled guard)
- `resources/css/app.css` — Adicionado `[x-cloak]` style

---

### Slide 9 — "Blaze" (Intelligent Rendering) ✅ IMPLEMENTADO
**Componente:** `saloon-dashboard` (MFC em `resources/views/components/⚡saloon-dashboard/`)

#### Status: Completo
Implementado como componente Livewire separado, nested no slide 9 via `@livewire('saloon-dashboard')`.

#### Arquitetura
- **Toggle:** Alpine.js (`x-data="{ showDemo: false }"`) — mesmo padrao do slide 5
- **Navegacao:** Layout recebe `$dispatch('slide-navigation')` para desabilitar setas durante demo
- **Code Viewer:** Modal Alpine.js com `x-teleport="body"`, tabs PHP/Blade
- **Modais:** TallStackUI `<x-ts-modal wire="newOrderModal">` para novo pedido completo
- **Toasts:** TallStackUI `$this->toast()->success()` para feedback de pedidos
- **Interacoes:** Trait `TallStackUi\Traits\Interactions`

#### O que Demonstra
- Template intencionalmente "pesado" com ~90+ nodes estaticos (cardapio 10 itens, 8 regras, equipe 5 pessoas, atmosfera 5 barras, decoracao 4 cards)
- **Unica parte dinamica:** contador de pedidos (`$orderCount`)
- Botao "Pedido Rapido" cria pedido aleatorio e incrementa contador
- Botao "Novo Pedido Completo" abre modal TallStackUI com formulario
- Indicador visual: "Blaze: 1 node re-renderizado / ~90+ nodes totais"
- Labels "ESTATICO" e "DINAMICO" marcam visualmente as zonas

#### Tabelas Envolvidas
- `saloon_orders` (criacao de pedidos)
- `saloon_drinks` (lista de bebidas disponiveis para o modal)

#### Arquivos
- `resources/views/components/⚡saloon-dashboard/saloon-dashboard.php` — Classe PHP
- `resources/views/components/⚡saloon-dashboard/saloon-dashboard.blade.php` — Template Blade
- `resources/views/components/slides/⚡s09-blaze/s09-blaze.blade.php` — Modificado (toggle + nested)

---

### Slide 11 — "Nova API para Frontend" (this. API) ✅ IMPLEMENTADO
**Componente:** `api-showdown` (MFC em `resources/views/components/⚡api-showdown/`)

#### Status: Completo
Implementado como componente Livewire separado, nested no slide 11 via `@livewire('api-showdown')`.

#### Arquitetura
- **Toggle:** Alpine.js (`x-data="{ showDemo: false }"`) — mesmo padrao dos slides 5 e 9
- **Navegacao:** Layout recebe `$dispatch('slide-navigation')` para desabilitar setas durante demo
- **Code Viewer:** Modal Alpine.js com `x-teleport="body"`, tabs PHP/Blade
- **Toasts:** TallStackUI `$this->toast()->success()` para feedback de votos
- **Interacoes:** Trait `TallStackUi\Traits\Interactions`

#### O que Demonstra
- **Entangle:** Campo de texto sincronizado — lado esquerdo usa `$wire.entangle('highlight')` via Alpine, lado direito usa `wire:model.live` direto (sem Alpine, sem boilerplate)
- **Votacao:** 4 outlaws mais perigosos com contagem de votos — esquerdo usa `@click="$wire.vote(id)"` (Alpine inline), direito usa `wire:click="vote(id)"` (Livewire nativo)
- **Script context:** Card comparativo mostrando que `this.` funciona dentro de `<script>` no componente (onde `this === $wire`)
- **Resultado identico:** Ambos chamam o mesmo metodo PHP `vote()`, mesma resposta
- **Reset:** Botao para zerar votos e demonstrar novamente
- Votos mantidos em estado do componente (array), sem coluna extra no banco
- **Nota tecnica:** `this.` so funciona dentro de `<script>` tags (Livewire faz bind de `this` para `$wire`). Em Alpine inline (`@click`), `$wire` continua sendo o magic variable correto

#### Tabelas Envolvidas
- `outlaws` (carrega 4 mais perigosos para votacao)

#### Arquivos
- `resources/views/components/⚡api-showdown/api-showdown.php` — Classe PHP
- `resources/views/components/⚡api-showdown/api-showdown.blade.php` — Template Blade
- `resources/views/components/slides/⚡s11-new-api/s11-new-api.blade.php` — Modificado (toggle + nested)

---

### Slide 12 — "Islands" (Lazy Loading & Isolation) ✅ IMPLEMENTADO
**Componente:** `town-dashboard` (MFC em `resources/views/components/⚡town-dashboard/`)

#### Status: Completo
Implementado como componente Livewire separado, nested no slide 12 via `@livewire('town-dashboard')`.

#### Arquitetura
- **Toggle:** Alpine.js (`x-data="{ showDemo: false }"`) — mesmo padrao dos slides 5, 9 e 11
- **Navegacao:** Layout recebe `$dispatch('slide-navigation')` para desabilitar setas durante demo
- **Code Viewer:** Modal Alpine.js com `x-teleport="body"`, tabs Blade/PHP
- **PHP minimo:** Classe do componente vazia — toda logica roda dentro de `@php` blocks em cada island
- **Sem sleep() artificial:** Tempo de carregamento depende do volume real de dados

#### O que Demonstra
- `@island(lazy: true)` / `@endisland` envolvendo blocos de conteudo
- `@placeholder` / `@endplaceholder` para skeleton loading com animate-pulse
- Lazy loading: cada island carrega independentemente via request separado
- Isolamento: cada island tem seu proprio ciclo de vida
- TTFB reduzido (pagina renderiza rapido com skeletons, dados vem depois)
- **Diferenca real de tempo** baseada em volume de dados (nao sleep artificial)
- Medicao de tempo real com `microtime(true)` exibida em cada island

#### Islands e Tabelas Envolvidas
| Island | Tabelas | Volume | Cor/Tema |
|--------|---------|--------|----------|
| Top Procurados | `outlaws` + `gangs` | ~38 rows | Orange |
| Pedidos do Saloon | `saloon_orders` + `saloon_drinks` + `outlaws` | ~550 rows | Amber |
| Relatorios do Xerife | `sheriff_reports` + `outlaws` + `bounty_hunters` | ~845 rows | Blue |
| Feed de Eventos | `town_events` + `outlaws` | ~2000 rows | Purple |

#### Arquivos
- `resources/views/components/⚡town-dashboard/town-dashboard.php` — Classe PHP (vazia, sem propriedades/metodos)
- `resources/views/components/⚡town-dashboard/town-dashboard.blade.php` — Template Blade com 4 islands
- `resources/views/components/slides/⚡s12-islands/s12-islands.blade.php` — Modificado (toggle + nested)

---

### Slide 5+9+12 Compartilhado — Componente de Visualizacao de Codigo

#### Descricao do Code Viewer
Um componente reutilizavel que exibe o codigo-fonte do caso de uso em um overlay fullscreen. E acionado por um botao `fad fa-code` presente em cada caso de uso.

#### Comportamento
1. Ao clicar em "Ver Codigo", abre overlay escuro (z-50, backdrop blur)
2. Tabs para alternar entre arquivos: "PHP" | "Blade" | "Migration" (quando aplicavel)
3. Codigo formatado com syntax highlight basico (classes CSS para keywords, strings, comments)
4. Scroll vertical para codigos longos
5. Botao "Fechar" ou tecla Escape para sair
6. O codigo e lido dos arquivos reais usando `file_get_contents()` no backend

#### Implementacao
- Componente Livewire reutilizavel: `CodeViewer`
- Recebe array de caminhos de arquivo como parametro
- Propriedade `$activeTab` para controlar qual arquivo esta visivel
- Syntax highlight via library PHP (ex: `highlight_string()` nativo do PHP para `.php`, ou Shiki/Torchlight se disponivel)
- Alternativa simples: `<pre><code>` com classes Tailwind para aparencia de terminal

---

## Slides SEM Caso de Uso Interativo

| Slide | Motivo |
|-------|--------|
| 1 - Capa | Conteudo estatico de abertura |
| 2 - Quem Sou Eu | Biografia, sem contexto tecnico interativo |
| 3 - O Inimigo do JS | Conceitual, comparacao de abordagens |
| 4 - Terreno Firme | Fundamentos Laravel, seria redundante com slide 5 |
| 6 - Bastidores | Diagrama de fluxo, melhor explicado visualmente do que com demo |
| 7 - O Lado B | Limitacoes conceituais, nao ha o que demonstrar interativamente |
| 8 - Livewire 4 | Slide de transicao/titulo |
| 10 - Single-File | Organizacao de codigo, a propria apresentacao ja e o exemplo |
| 13 - SPA-Like | A propria navegacao entre slides JA E a demonstracao |
| 14 - Raio X WebNews | Case study, dados conceituais do projeto real |
| 15 - Minha Visao | Slide de reflexao pessoal |
| 16 - Creditos | Slide de encerramento |

---

## Resumo de Implementacao

### Ordem de Desenvolvimento
1. **Migrations** — `php artisan make:migration` para todas as 8 tabelas (com prefixos de coluna)
2. **Models** — Todos os 8 models com `$primaryKey`, `$table`, custom timestamps, relacoes
3. **Factories** — Para geracao de dados em massa com dados tematicos
4. **Seeders** — Popular com volumes diferentes (8 a 2000 registros)
5. **Componente CodeViewer** — Reutilizavel, overlay de codigo
6. **Mecanica de Toggle** — Botao toggle no layout ou em cada slide elegivel
7. **Slide 5: Wanted Board** — Caso de uso mais rico e completo
8. **Slide 9: Saloon Dashboard** — Demonstracao do Blaze
9. **Slide 11: API Showdown** — Comparacao de sintaxes
10. **Slide 12: Town Dashboard** — Demonstracao de Islands

### Models Eloquent
Todos os models devem configurar as colunas prefixadas:

```php
// Exemplo para Outlaw
class Outlaw extends Model
{
    protected $primaryKey = 'otl_id';
    const CREATED_AT = 'otl_created_at';
    const UPDATED_AT = 'otl_updated_at';
    // ...
}
```

- `App\Models\Gang` — hasMany outlaws
- `App\Models\Outlaw` — belongsTo gang, hasMany horses/orders/reports; scopes: `wanted()`, `captured()`, `escaped()`, `search($term)`
- `App\Models\Horse` — belongsTo outlaw
- `App\Models\BountyHunter` — hasMany sheriff_reports
- `App\Models\SaloonDrink` — hasMany orders
- `App\Models\SaloonOrder` — belongsTo outlaw, belongsTo drink
- `App\Models\SheriffReport` — belongsTo outlaw, belongsTo hunter
- `App\Models\TownEvent` — belongsTo outlaw (nullable); scopes: `recent()`, `bySeverity($level)`, `unresolved()`

### Factories e Seeders
| Factory | Registros | Dados Tematicos |
|---------|-----------|-----------------|
| `GangFactory` | **8** | Nomes de gangues do velho oeste |
| `OutlawFactory` | **30** | Nomes, apelidos, crimes variados |
| `HorseFactory` | **45** | Nomes, racas, cores de cavalos |
| `BountyHunterFactory` | **15** | Nomes de cacadores famosos |
| `SaloonDrinkFactory` | **20** | Bebidas de epoca (whiskey, sarsaparilla, etc.) |
| `SaloonOrderFactory` | **500** | Pedidos variados com precos |
| `SheriffReportFactory` | **800** | Relatorios de avistamento, captura, patrulha |
| `TownEventFactory` | **2000** | Eventos tipicos do velho oeste |

Cada seeder DEVE ser criado e registrado no `DatabaseSeeder`. Executar via `php artisan db:seed`.

### Componentes Livewire a Criar
| Componente | Tipo | Slide |
|------------|------|-------|
| `UseCase05WantedBoard` | MFC full | Slide 5 |
| `UseCase09SaloonDashboard` | MFC full | Slide 9 |
| `UseCase11ApiShowdown` | MFC full | Slide 11 |
| `UseCase12TownDashboard` | MFC full (com sub-componentes) | Slide 12 |
| `UseCase12TopOutlaws` | MFC sub-componente (island) | Slide 12 |
| `UseCase12RecentOrders` | MFC sub-componente (island) | Slide 12 |
| `UseCase12SheriffReports` | MFC sub-componente (island) | Slide 12 |
| `UseCase12EventFeed` | MFC sub-componente (island) | Slide 12 |
| `CodeViewer` | MFC reutilizavel | Todos |
