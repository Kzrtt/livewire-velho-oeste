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

### Slide 5 — "4 Meses de Livewire" (Directives Showcase)
**Componente do caso de uso:** `UseCase05WantedBoard`

#### Descricao
Um **"Quadro de Procurados"** (Wanted Board) que funciona como um mini-app CRUD demonstrando multiplas diretivas Livewire em um unico cenario coeso. O publico ve um painel estilo velho oeste com fichas de bandidos, podendo buscar, filtrar, capturar e interagir.

#### Diretivas Demonstradas
| Diretiva | Como e Demonstrada |
|----------|-------------------|
| `wire:model.live` | Campo de busca filtra outlaws em tempo real |
| `wire:click` | Botoes "Capturar" e "Libertar" mudam status do outlaw |
| `wire:loading` | Spinner aparece durante acoes de captura |
| `wire:confirm` | Confirmacao ao tentar libertar um bandido perigoso |
| `wire:dirty` | Indicador visual ao editar a recompensa de um outlaw |
| `wire:poll.5s` | Contador de "novos avistamentos" atualiza a cada 5s |
| `wire:key` | Cada card de outlaw tem key unica para morph eficiente |
| `wire:transition` | Cards animam ao entrar/sair da lista filtrada |

#### Tabelas Envolvidas
- `outlaws` (principal)

#### Layout do Caso de Uso
```
+--------------------------------------------------+
|  [Buscar bandido... ] 🔍    Filtro: [Todos ▼]    |
|  Avistamentos hoje: 12 (atualiza via poll)        |
+--------------------------------------------------+
|  +-------------+  +-------------+  +----------+  |
|  | 🤠 "El Loco"|  | 🤠 "Snake"  |  | 🤠 ...   |  |
|  | $5,000      |  | $2,500      |  | ...      |  |
|  | Roubo       |  | Fraude      |  | ...      |  |
|  | [Capturar]  |  | [Capturar]  |  | ...      |  |
|  +-------------+  +-------------+  +----------+  |
+--------------------------------------------------+
```

#### Detalhes de Implementacao
- Componente Livewire com propriedades: `$search`, `$statusFilter`, `$editingBounty`
- Computed property para lista filtrada com Eloquent query
- Metodos: `capture($id)`, `release($id)`, `updateBounty($id, $value)`
- A busca usa `wire:model.live.debounce.300ms` para nao sobrecarregar
- Cada acao de captura tem um `sleep(1)` artificial para demonstrar `wire:loading`

---

### Slide 9 — "Blaze" (Intelligent Rendering)
**Componente do caso de uso:** `UseCase09SaloonDashboard`

#### Descricao
Um **"Painel do Saloon"** com muitos elementos estaticos (decoracao, menu fixo, regras da casa) e apenas **um contador dinamico** de pedidos. O objetivo e demonstrar que o Blaze so re-renderiza a parte dinamica, ignorando todo o conteudo estatico. A tela tera um indicador visual mostrando "Nodes processados: 1" vs "Total de nodes: ~80+".

#### O que Demonstra
- Blaze identifica regioes estaticas em compile-time
- Apenas a regiao do contador e re-renderizada
- O restante do template (80+ nodes) e completamente ignorado
- Indicador visual de "economia de render" para a plateia entender o impacto

#### Tabelas Envolvidas
- `saloon_orders` (para contagem dinamica)

#### Layout do Caso de Uso
```
+--------------------------------------------------+
|  🍺 SALOON DO VELHO OESTE                        |
+--------------------------------------------------+
|  MENU (estatico)     |  REGRAS (estatico)        |
|  - Whiskey $3        |  - Sem armas no balcao    |
|  - Cerveja $1        |  - Pagamento adiantado    |
|  - Sarsaparilla $2   |  - Sem duelos dentro      |
|  - Cafe $0.50        |  - Respeite o barman      |
+----------------------+---------------------------+
|  📊 PEDIDOS AGORA: [ 47 ]  [+1 Pedido]           |
|  ⚡ Blaze: 1 node re-rendered / 84 total nodes   |
+--------------------------------------------------+
|  DECORACAO (estatico) - quadros, molduras, etc    |
+--------------------------------------------------+
```

#### Detalhes de Implementacao
- Template intencionalmente "pesado" com muitos elementos estaticos HTML
- Unica parte dinamica: contador de pedidos (`$orderCount`)
- Botao "[+1 Pedido]" incrementa o contador via `wire:click`
- Cria um novo `saloon_orders` no banco a cada clique
- Indicador de nodes re-renderizados (pode ser simulado visualmente ou real via JS hook)
- Toda a "decoracao" estatica e proposital: demonstra que Blaze ignora tudo isso

---

### Slide 11 — "Nova API para Frontend" (this. API)
**Componente do caso de uso:** `UseCase11ApiShowdown`

#### Descricao
Um **"Duelo de APIs"** onde a mesma acao e executada lado a lado usando a sintaxe antiga (`$wire`) e a nova (`this.`). O caso de uso mostra um mini-componente de votacao em um outlaw ("Mais Procurado da Semana") onde o publico ve ambas as sintaxes executando a mesma logica.

#### O que Demonstra
- Sintaxe `this.` e mais natural e familiar (parece Vue/React/Alpine)
- A mesma funcionalidade, codigo mais limpo
- Integracao com Alpine.js usando `this.` de forma fluida
- `this.$wire` -> `this.` como substituicao direta

#### Tabelas Envolvidas
- `outlaws` (para votacao)

#### Layout do Caso de Uso
```
+--------------------------------------------------+
|  ⚔️ DUELO DE APIS                                 |
+--------------------------------------------------+
|  SINTAXE ANTIGA ($wire)  |  SINTAXE NOVA (this.) |
|  -----------------------  |  -------------------- |
|  🤠 El Loco              |  🤠 El Loco           |
|  Votos: 12               |  Votos: 12            |
|  [👍 Votar]              |  [👍 Votar]           |
|                           |                       |
|  $wire.vote(1)           |  this.vote(1)         |
|  $wire.votes             |  this.votes           |
|  $wire.entangle('x')    |  this.x (reativo)     |
+--------------------------------------------------+
```

#### Detalhes de Implementacao
- Dois mini-componentes lado a lado (ou um componente com dois "lados")
- Lado esquerdo: usa Alpine com `$wire.metodo()` e `$wire.propriedade` (sintaxe v3)
- Lado direito: usa Alpine com `this.metodo()` e `this.propriedade` (sintaxe v4)
- Ambos chamam o mesmo backend, demonstrando que o resultado e identico
- Exibe o trecho de codigo JS abaixo de cada lado para comparacao visual
- Votar incrementa um campo `votes` no outlaw (coluna adicional ou cache)

> **Nota:** Como o Livewire 4 suporta ambas as sintaxes durante a transicao, ambos os lados funcionam de verdade. O ponto e mostrar que `this.` e mais limpo.

---

### Slide 12 — "Islands" (Lazy Loading & Isolation)
**Componente do caso de uso:** `UseCase12TownDashboard`

#### Descricao
Um **"Painel da Cidade"** com 3 widgets independentes, cada um carregado como uma Island separada. O publico ve os placeholders/skeletons aparecerem primeiro e os widgets carregarem progressivamente. A diferenca de tempo de carregamento e **real**: cada widget consulta tabelas com volumes drasticamente diferentes de dados (30, 500 e 2000 registros), demonstrando que o tempo depende da complexidade da query, sem nenhum delay artificial.

#### O que Demonstra
- `@island` / `@endisland` envolvendo componentes
- Lazy loading: widgets carregam sob demanda, nao bloqueiam a pagina
- Isolamento: cada island tem seu proprio ciclo de vida
- Skeleton/placeholder enquanto carrega
- TTFB reduzido (pagina renderiza rapido, widgets vem depois)
- **Diferenca real de tempo** baseada em volume de dados (nao sleep artificial)

#### Tabelas Envolvidas
| Widget | Tabelas | Registros | Complexidade | Tempo Esperado |
|--------|---------|-----------|-------------|----------------|
| Top Procurados | `outlaws` + `gangs` (~30+8 rows) | Leve, join simples | Rapido |
| Pedidos do Saloon | `saloon_orders` + `saloon_drinks` + `outlaws` (~500+20+30 rows) | Medio, joins multiplos | Moderado |
| Relatorios do Xerife | `sheriff_reports` + `outlaws` + `bounty_hunters` (~800+30+15 rows) | Medio-alto, aggregations | Mais lento |
| Feed de Eventos | `town_events` + `outlaws` (~2000+30 rows) | Pesado, filtros + ordenacao | Mais lento |

#### Layout do Caso de Uso
```
+--------------------------------------------------+
|  🏘️ PAINEL DA CIDADE          [Recarregar Tudo]   |
+--------------------------------------------------+
|  +-- ISLAND 1 --------+  +-- ISLAND 2 ---------+ |
|  | 🤠 Top Procurados  |  | 🍺 Pedidos Saloon   | |
|  | outlaws + gangs    |  | orders + drinks     | |
|  | 1. El Loco $5,000  |  | Whiskey x2 - Snake  | |
|  | (Serpentes) ★★★★★  |  | Cerveja x1 - Joe    | |
|  | Carregado em: 45ms |  | Carregado em: 120ms | |
|  +--------------------+  +---------------------+ |
|  +-- ISLAND 3 --------+  +-- ISLAND 4 ---------+ |
|  | 📋 Relatorios      |  | 📰 Feed Eventos     | |
|  | reports + hunters  |  | events + outlaws    | |
|  | Avistamento: Snake |  | Assalto ao banco!   | |
|  | Por: John "Hawk"   |  | Duelo na rua        | |
|  | Carregado em: 200ms|  | Carregado em: 320ms | |
|  +--------------------+  +---------------------+ |
+--------------------------------------------------+
```

#### Detalhes de Implementacao
- 4 sub-componentes Livewire, cada um envolvido por `@island`
- **SEM `sleep()` artificial** — o tempo de carregamento vem do volume real de dados:
  - Top Procurados: query em `outlaws` + join `gangs` (~38 rows) — carrega rapido
  - Pedidos do Saloon: query em `saloon_orders` + joins `saloon_drinks` + `outlaws` (~550 rows) — moderado
  - Relatorios do Xerife: query em `sheriff_reports` + joins `outlaws` + `bounty_hunters` (~845 rows) com aggregations — mais lento
  - Feed de Eventos: query em `town_events` + join `outlaws` (~2030 rows) com filtros e ordenacao — mais lento
- Cada island mede e exibe seu tempo real de carregamento (`$loadTime`)
- Skeleton placeholders com animacao de pulse enquanto carrega
- Botao "Recarregar Tudo" reseta as islands para demonstrar novamente
- Cada island faz sua propria query Eloquent independente
- As queries devem incluir operacoes realistas (joins, aggregations, ordenacao) para que a diferenca de tempo seja perceptivel

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
