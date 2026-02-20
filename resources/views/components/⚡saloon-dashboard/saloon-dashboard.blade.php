<div x-data="{ showCode: false, codeTab: 'blade' }">
    <div class="w-full max-w-6xl mx-auto space-y-5">
        {{-- Header --}}
        <div class="text-center space-y-2">
            <h2 class="text-2xl md:text-4xl font-bold text-stone-50">
                <i class="fad fa-saloon text-orange-500 mr-2"></i>
                Saloon do <span class="text-orange-500">Velho Oeste</span>
            </h2>
            <p class="text-sm text-stone-400">
                Template pesado, <span class="text-orange-400">uma unica parte dinamica</span> &mdash; Blaze ignora o resto
            </p>
        </div>

        {{-- ========== STATIC ZONE: Saloon sign ========== --}}
        <div class="rounded-xl bg-stone-800/60 border border-amber-900/40 overflow-hidden">
            <div class="bg-amber-900/30 border-b border-amber-900/30 px-5 py-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <i class="fad fa-sign text-amber-500 text-xl"></i>
                    <span class="text-lg font-bold text-amber-400 tracking-wide uppercase">The Rusty Spur Saloon</span>
                </div>
                <span class="text-[10px] text-stone-600 font-mono">EST. 1873</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-0 divide-y md:divide-y-0 md:divide-x divide-stone-700/30">
                {{-- ========== STATIC ZONE: Menu ========== --}}
                <div class="p-4 space-y-3">
                    <div class="flex items-center gap-2 mb-3">
                        <i class="fad fa-glass-whiskey text-amber-500 text-sm"></i>
                        <span class="text-sm font-bold text-stone-200 uppercase tracking-wide">Cardapio</span>
                        <span class="text-[9px] bg-stone-700/50 text-stone-500 px-1.5 py-0.5 rounded font-mono ml-auto">ESTATICO</span>
                    </div>

                    <div class="space-y-1.5 text-xs">
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-glass-whiskey text-amber-600 mr-1.5"></i>Whiskey de Centeio</span>
                            <span class="text-amber-400">$3.00</span>
                        </div>
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-glass-whiskey text-amber-600 mr-1.5"></i>Bourbon Premium</span>
                            <span class="text-amber-400">$5.00</span>
                        </div>
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-beer text-amber-600 mr-1.5"></i>Cerveja do Barril</span>
                            <span class="text-amber-400">$1.50</span>
                        </div>
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-beer text-amber-600 mr-1.5"></i>Cerveja Importada</span>
                            <span class="text-amber-400">$2.50</span>
                        </div>
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-wine-bottle text-amber-600 mr-1.5"></i>Vinho Tinto</span>
                            <span class="text-amber-400">$4.00</span>
                        </div>
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-wine-glass text-amber-600 mr-1.5"></i>Sarsaparilla</span>
                            <span class="text-amber-400">$0.75</span>
                        </div>
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-mug-hot text-amber-600 mr-1.5"></i>Cafe Preto</span>
                            <span class="text-amber-400">$0.50</span>
                        </div>
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-mug-hot text-amber-600 mr-1.5"></i>Cafe com Whiskey</span>
                            <span class="text-amber-400">$3.50</span>
                        </div>
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-tint text-amber-600 mr-1.5"></i>Agua Mineral</span>
                            <span class="text-amber-400">$0.25</span>
                        </div>
                        <div class="flex justify-between text-stone-300">
                            <span><i class="fad fa-lemon text-amber-600 mr-1.5"></i>Limonada</span>
                            <span class="text-amber-400">$0.60</span>
                        </div>
                    </div>
                </div>

                {{-- ========== STATIC ZONE: House rules ========== --}}
                <div class="p-4 space-y-3">
                    <div class="flex items-center gap-2 mb-3">
                        <i class="fad fa-scroll-old text-amber-500 text-sm"></i>
                        <span class="text-sm font-bold text-stone-200 uppercase tracking-wide">Regras da Casa</span>
                        <span class="text-[9px] bg-stone-700/50 text-stone-500 px-1.5 py-0.5 rounded font-mono ml-auto">ESTATICO</span>
                    </div>

                    <div class="space-y-2 text-xs">
                        <div class="flex items-start gap-2 text-stone-400">
                            <i class="fad fa-ban text-red-500/70 mt-0.5 shrink-0"></i>
                            <span>Armas de fogo devem ser entregues no balcao</span>
                        </div>
                        <div class="flex items-start gap-2 text-stone-400">
                            <i class="fad fa-coins text-amber-500/70 mt-0.5 shrink-0"></i>
                            <span>Pagamento adiantado — sem fiado, parceiro</span>
                        </div>
                        <div class="flex items-start gap-2 text-stone-400">
                            <i class="fad fa-swords text-red-500/70 mt-0.5 shrink-0"></i>
                            <span>Duelos somente fora do estabelecimento</span>
                        </div>
                        <div class="flex items-start gap-2 text-stone-400">
                            <i class="fad fa-user-shield text-blue-500/70 mt-0.5 shrink-0"></i>
                            <span>Respeite o barman — ele decide quem bebe</span>
                        </div>
                        <div class="flex items-start gap-2 text-stone-400">
                            <i class="fad fa-horse text-amber-500/70 mt-0.5 shrink-0"></i>
                            <span>Cavalos devem ficar amarrados na frente</span>
                        </div>
                        <div class="flex items-start gap-2 text-stone-400">
                            <i class="fad fa-music text-purple-500/70 mt-0.5 shrink-0"></i>
                            <span>Pianista toca das 18h as 02h — nao aceita pedidos</span>
                        </div>
                        <div class="flex items-start gap-2 text-stone-400">
                            <i class="fad fa-cards text-green-500/70 mt-0.5 shrink-0"></i>
                            <span>Jogos de poker somente na mesa dos fundos</span>
                        </div>
                        <div class="flex items-start gap-2 text-stone-400">
                            <i class="fad fa-exclamation-triangle text-yellow-500/70 mt-0.5 shrink-0"></i>
                            <span>Trapaceiros serao jogados pela janela</span>
                        </div>
                    </div>
                </div>

                {{-- ========== DYNAMIC ZONE: Order counter ========== --}}
                <div class="p-4 space-y-3">
                    <div class="flex items-center gap-2 mb-3">
                        <i class="fad fa-cash-register text-orange-500 text-sm"></i>
                        <span class="text-sm font-bold text-stone-200 uppercase tracking-wide">Pedidos</span>
                        <span class="text-[9px] bg-orange-500/20 text-orange-400 px-1.5 py-0.5 rounded font-mono ml-auto">DINAMICO</span>
                    </div>

                    <div class="text-center py-3">
                        <div class="text-5xl font-black text-orange-400">
                            {{ $orderCount }}
                        </div>
                        <div class="text-xs text-stone-500 mt-1">pedidos registrados</div>
                    </div>

                    <div class="space-y-2">
                        <button
                            wire:click="quickOrder"
                            wire:loading.attr="disabled"
                            wire:target="quickOrder"
                            class="w-full text-xs px-3 py-2 rounded-lg bg-orange-500/20 text-orange-400 border border-orange-500/30 hover:bg-orange-500/30 transition-colors cursor-pointer disabled:opacity-50"
                        >
                            <span wire:loading.remove wire:target="quickOrder">
                                <i class="fad fa-plus mr-1"></i>Pedido Rapido
                            </span>
                            <span wire:loading wire:target="quickOrder">
                                <i class="fad fa-spinner-third fa-spin mr-1"></i>Registrando...
                            </span>
                        </button>
                        <button
                            wire:click="openNewOrder"
                            class="w-full text-xs px-3 py-2 rounded-lg bg-stone-700/50 text-stone-300 border border-stone-600/30 hover:bg-stone-700/70 transition-colors cursor-pointer"
                        >
                            <i class="fad fa-list-alt mr-1"></i>Novo Pedido Completo
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========== STATIC ZONE: Decoration ========== --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <div class="rounded-lg bg-stone-800/40 border border-stone-700/30 p-3 text-center space-y-1">
                <i class="fad fa-hat-cowboy text-amber-600 text-lg"></i>
                <p class="text-[10px] text-stone-500">Chapeus perdidos</p>
                <p class="text-sm font-bold text-stone-400">47</p>
            </div>
            <div class="rounded-lg bg-stone-800/40 border border-stone-700/30 p-3 text-center space-y-1">
                <i class="fad fa-chair text-amber-600 text-lg"></i>
                <p class="text-[10px] text-stone-500">Cadeiras quebradas</p>
                <p class="text-sm font-bold text-stone-400">12</p>
            </div>
            <div class="rounded-lg bg-stone-800/40 border border-stone-700/30 p-3 text-center space-y-1">
                <i class="fad fa-window-frame text-amber-600 text-lg"></i>
                <p class="text-[10px] text-stone-500">Janelas quebradas</p>
                <p class="text-sm font-bold text-stone-400">3</p>
            </div>
            <div class="rounded-lg bg-stone-800/40 border border-stone-700/30 p-3 text-center space-y-1">
                <i class="fad fa-piano text-amber-600 text-lg"></i>
                <p class="text-[10px] text-stone-500">Pianos sobreviventes</p>
                <p class="text-sm font-bold text-stone-400">1</p>
            </div>
        </div>

        {{-- Blaze indicator --}}
        <div class="flex flex-col md:flex-row items-center justify-center gap-3">
            <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-green-500/10 border border-green-500/30">
                <i class="fad fa-fire text-green-400 text-sm"></i>
                <span class="text-xs text-green-400 font-bold">Blaze: 1 node re-renderizado</span>
                <span class="text-xs text-stone-500">/ ~90+ nodes totais</span>
            </div>
            <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-orange-500/10 border border-orange-500/30">
                <span class="text-xs text-orange-400">Clique "Pedido Rapido" e observe: so o <span class="font-bold">numero</span> muda!</span>
            </div>
            <button
                x-on:click="showCode = true"
                class="flex items-center gap-2 px-4 py-2 rounded-full bg-stone-800/60 border border-stone-700/50 text-xs text-stone-300 hover:text-orange-400 hover:border-orange-500/50 transition-colors cursor-pointer"
            >
                <i class="fad fa-code"></i>
                <span>Codigo</span>
            </button>
        </div>

        {{-- ========== STATIC ZONE: Staff and atmosphere ========== --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="rounded-xl bg-stone-800/40 border border-stone-700/30 p-4 space-y-3">
                <div class="flex items-center gap-2">
                    <i class="fad fa-users text-amber-500 text-sm"></i>
                    <span class="text-xs font-bold text-stone-300 uppercase tracking-wide">Equipe do Saloon</span>
                    <span class="text-[9px] bg-stone-700/50 text-stone-500 px-1.5 py-0.5 rounded font-mono ml-auto">ESTATICO</span>
                </div>
                <div class="space-y-2 text-xs">
                    <div class="flex items-center gap-2 text-stone-400">
                        <div class="w-6 h-6 rounded-full bg-amber-900/50 flex items-center justify-center shrink-0">
                            <i class="fad fa-user text-amber-500 text-[10px]"></i>
                        </div>
                        <div>
                            <span class="text-stone-300 font-medium">Big Pete</span>
                            <span class="text-stone-600 ml-1">— Barman-chefe</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-stone-400">
                        <div class="w-6 h-6 rounded-full bg-amber-900/50 flex items-center justify-center shrink-0">
                            <i class="fad fa-user text-amber-500 text-[10px]"></i>
                        </div>
                        <div>
                            <span class="text-stone-300 font-medium">Slim Johnson</span>
                            <span class="text-stone-600 ml-1">— Garcom</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-stone-400">
                        <div class="w-6 h-6 rounded-full bg-amber-900/50 flex items-center justify-center shrink-0">
                            <i class="fad fa-user text-amber-500 text-[10px]"></i>
                        </div>
                        <div>
                            <span class="text-stone-300 font-medium">Ivory Jack</span>
                            <span class="text-stone-600 ml-1">— Pianista</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-stone-400">
                        <div class="w-6 h-6 rounded-full bg-amber-900/50 flex items-center justify-center shrink-0">
                            <i class="fad fa-user text-amber-500 text-[10px]"></i>
                        </div>
                        <div>
                            <span class="text-stone-300 font-medium">Ma Baker</span>
                            <span class="text-stone-600 ml-1">— Cozinheira</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-stone-400">
                        <div class="w-6 h-6 rounded-full bg-amber-900/50 flex items-center justify-center shrink-0">
                            <i class="fad fa-user text-amber-500 text-[10px]"></i>
                        </div>
                        <div>
                            <span class="text-stone-300 font-medium">Silent Bob</span>
                            <span class="text-stone-600 ml-1">— Seguranca</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-xl bg-stone-800/40 border border-stone-700/30 p-4 space-y-3">
                <div class="flex items-center gap-2">
                    <i class="fad fa-stars text-amber-500 text-sm"></i>
                    <span class="text-xs font-bold text-stone-300 uppercase tracking-wide">Atmosfera Hoje</span>
                    <span class="text-[9px] bg-stone-700/50 text-stone-500 px-1.5 py-0.5 rounded font-mono ml-auto">ESTATICO</span>
                </div>
                <div class="space-y-2 text-xs">
                    <div class="flex items-center justify-between text-stone-400">
                        <span>Nivel de barulho</span>
                        <div class="flex gap-0.5">
                            <div class="w-2 h-3 rounded-sm bg-green-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-green-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-yellow-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-yellow-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-stone-700"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-stone-400">
                        <span>Chance de briga</span>
                        <div class="flex gap-0.5">
                            <div class="w-2 h-3 rounded-sm bg-red-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-red-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-red-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-stone-700"></div>
                            <div class="w-2 h-3 rounded-sm bg-stone-700"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-stone-400">
                        <span>Qualidade do whiskey</span>
                        <div class="flex gap-0.5">
                            <div class="w-2 h-3 rounded-sm bg-amber-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-amber-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-amber-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-amber-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-amber-500"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-stone-400">
                        <span>Mesas disponiveis</span>
                        <div class="flex gap-0.5">
                            <div class="w-2 h-3 rounded-sm bg-blue-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-blue-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-stone-700"></div>
                            <div class="w-2 h-3 rounded-sm bg-stone-700"></div>
                            <div class="w-2 h-3 rounded-sm bg-stone-700"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-stone-400">
                        <span>Humor do pianista</span>
                        <div class="flex gap-0.5">
                            <div class="w-2 h-3 rounded-sm bg-purple-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-purple-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-purple-500"></div>
                            <div class="w-2 h-3 rounded-sm bg-stone-700"></div>
                            <div class="w-2 h-3 rounded-sm bg-stone-700"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- New Order Modal (TallStackUI) --}}
    <x-ts-modal wire="newOrderModal" title="Novo Pedido" center>
        <div class="space-y-4">
            <div>
                <label class="text-xs text-stone-400 mb-1 block">Nome do Cliente</label>
                <input
                    wire:model="customerName"
                    type="text"
                    placeholder="Forasteiro"
                    class="w-full bg-stone-800/60 border border-stone-700/50 rounded-lg px-4 py-2 text-sm text-stone-100 placeholder-stone-500 focus:border-orange-500/50 focus:outline-none"
                />
            </div>

            <div>
                <label class="text-xs text-stone-400 mb-1 block">Bebida</label>
                <select
                    wire:model="selectedDrinkId"
                    class="w-full bg-stone-800/60 border border-stone-700/50 rounded-lg px-4 py-2 text-sm text-stone-100 focus:border-orange-500/50 focus:outline-none cursor-pointer"
                >
                    <option value="">Selecione...</option>
                    @foreach($this->drinks as $drink)
                        <option value="{{ $drink->sdk_id }}">
                            {{ $drink->sdk_name }} ({{ $drink->sdk_type }}) — ${{ number_format((float) $drink->sdk_price, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-xs text-stone-400 mb-1 block">Quantidade</label>
                <input
                    wire:model="orderQuantity"
                    type="number"
                    min="1"
                    max="10"
                    class="w-full bg-stone-800/60 border border-stone-700/50 rounded-lg px-4 py-2 text-sm text-stone-100 focus:border-orange-500/50 focus:outline-none"
                />
            </div>
        </div>

        <x-slot:footer>
            <div class="flex justify-end gap-2">
                <button
                    wire:click="$set('newOrderModal', false)"
                    class="px-4 py-2 text-sm text-stone-400 hover:text-stone-200 transition-colors cursor-pointer"
                >
                    Cancelar
                </button>
                <button
                    wire:click="placeOrder"
                    class="px-4 py-2 text-sm bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-colors cursor-pointer"
                >
                    <i class="fad fa-check mr-1"></i>Registrar Pedido
                </button>
            </div>
        </x-slot:footer>
    </x-ts-modal>

    {{-- Code Viewer Modal --}}
    <template x-teleport="body">
        <div
            x-show="showCode"
            x-transition.opacity.duration.200ms
            x-cloak
            class="fixed inset-0 z-[100] bg-stone-900/95 backdrop-blur-sm flex flex-col"
            x-on:keydown.escape.window="showCode = false"
        >
            {{-- Modal header --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-stone-700/50">
                <div class="flex items-center gap-4">
                    <h3 class="text-lg font-bold text-stone-50">
                        <i class="fad fa-code text-orange-500 mr-2"></i>Codigo — Saloon Dashboard
                    </h3>
                    <div class="flex gap-1">
                        <button
                            x-on:click="codeTab = 'blade'"
                            x-bind:class="codeTab === 'blade' ? 'bg-orange-500/20 text-orange-400 border-orange-500/40' : 'bg-stone-800/60 text-stone-400 border-stone-700/50'"
                            class="px-3 py-1 text-xs font-mono rounded-lg border transition-colors cursor-pointer"
                        >Blade</button>
                        <button
                            x-on:click="codeTab = 'php'"
                            x-bind:class="codeTab === 'php' ? 'bg-orange-500/20 text-orange-400 border-orange-500/40' : 'bg-stone-800/60 text-stone-400 border-stone-700/50'"
                            class="px-3 py-1 text-xs font-mono rounded-lg border transition-colors cursor-pointer"
                        >PHP</button>
                    </div>
                </div>
                <button x-on:click="showCode = false" class="text-stone-400 hover:text-orange-400 transition-colors cursor-pointer">
                    <i class="fad fa-times text-xl"></i>
                </button>
            </div>

            {{-- Code content --}}
            <div class="flex-1 overflow-auto p-6">
                {{-- Blade tab --}}
                <div x-show="codeTab === 'blade'" class="rounded-xl bg-stone-800/60 border border-stone-700/50 p-5 font-mono text-xs leading-relaxed overflow-x-auto">
<pre class="text-stone-300"><span class="text-stone-500">{{-- ~90+ nodes de conteudo ESTATICO --}}</span>
<span class="text-stone-500">{{-- Blaze ignora TUDO isso no re-render --}}</span>

&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">class</span>=<span class="text-green-400">"saloon-header"</span>&gt;
    The Rusty Spur Saloon - EST. 1873
&lt;/<span class="text-amber-300">div</span>&gt;

<span class="text-stone-500">{{-- Cardapio: 10 itens estaticos --}}</span>
&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">class</span>=<span class="text-green-400">"menu"</span>&gt;
    Whiskey de Centeio ... $3.00
    Bourbon Premium ... $5.00
    <span class="text-stone-600">... (mais 8 itens) ...</span>
&lt;/<span class="text-amber-300">div</span>&gt;

<span class="text-stone-500">{{-- Regras: 8 itens estaticos --}}</span>
&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">class</span>=<span class="text-green-400">"rules"</span>&gt;
    Armas no balcao, pagamento adiantado...
    <span class="text-stone-600">... (mais 6 regras) ...</span>
&lt;/<span class="text-amber-300">div</span>&gt;

<span class="text-stone-500">{{-- ⚡ UNICA parte dinamica ⚡ --}}</span>
&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">class</span>=<span class="text-green-400">"orders"</span>&gt;
    &lt;<span class="text-amber-300">span</span> <span class="text-orange-400">class</span>=<span class="text-green-400">"text-5xl"</span>&gt;
        @{{ $orderCount }}  <span class="text-green-400 text-[9px]">← SO ISSO E RE-RENDERIZADO</span>
    &lt;/<span class="text-amber-300">span</span>&gt;

    &lt;<span class="text-amber-300">button</span> <span class="text-orange-400">wire:click</span>=<span class="text-green-400">"quickOrder"</span>&gt;
        Pedido Rapido
    &lt;/<span class="text-amber-300">button</span>&gt;

    &lt;<span class="text-amber-300">button</span> <span class="text-orange-400">wire:click</span>=<span class="text-green-400">"openNewOrder"</span>&gt;
        Novo Pedido Completo
    &lt;/<span class="text-amber-300">button</span>&gt;
&lt;/<span class="text-amber-300">div</span>&gt;

<span class="text-stone-500">{{-- Modal via TallStackUI --}}</span>
&lt;<span class="text-amber-300">x-ts-modal</span> <span class="text-orange-400">wire</span>=<span class="text-green-400">"newOrderModal"</span> <span class="text-orange-400">title</span>=<span class="text-green-400">"Novo Pedido"</span>&gt;
    &lt;<span class="text-amber-300">select</span> <span class="text-orange-400">wire:model</span>=<span class="text-green-400">"selectedDrinkId"</span>&gt;...&lt;/<span class="text-amber-300">select</span>&gt;
    &lt;<span class="text-amber-300">input</span> <span class="text-orange-400">wire:model</span>=<span class="text-green-400">"orderQuantity"</span> /&gt;
&lt;/<span class="text-amber-300">x-ts-modal</span>&gt;

<span class="text-stone-500">{{-- Decoracao, equipe, atmosfera: +40 nodes estaticos --}}</span>
<span class="text-stone-500">{{-- Blaze identifica tudo como "zona morta" --}}</span></pre>
                </div>

                {{-- PHP tab --}}
                <div x-show="codeTab === 'php'" class="rounded-xl bg-stone-800/60 border border-stone-700/50 p-5 font-mono text-xs leading-relaxed overflow-x-auto">
<pre class="text-stone-300"><span class="text-purple-400">use</span> <span class="text-amber-300">App\Models\SaloonDrink</span>;
<span class="text-purple-400">use</span> <span class="text-amber-300">App\Models\SaloonOrder</span>;
<span class="text-purple-400">use</span> <span class="text-amber-300">Livewire\Attributes\Computed</span>;
<span class="text-purple-400">use</span> <span class="text-amber-300">Livewire\Component</span>;
<span class="text-purple-400">use</span> <span class="text-amber-300">TallStackUi\Traits\Interactions</span>;

<span class="text-purple-400">new class extends</span> <span class="text-amber-300">Component</span>
{
    <span class="text-purple-400">use</span> <span class="text-amber-300">Interactions</span>;

    <span class="text-purple-400">public</span> <span class="text-cyan-400">int</span> <span class="text-orange-400">$orderCount</span> = <span class="text-cyan-400">0</span>;
    <span class="text-purple-400">public</span> <span class="text-cyan-400">bool</span> <span class="text-orange-400">$newOrderModal</span> = <span class="text-cyan-400">false</span>;

    <span class="text-purple-400">public function</span> <span class="text-amber-300">mount</span>(): <span class="text-cyan-400">void</span>
    {
        <span class="text-orange-400">$this</span>-&gt;<span class="text-orange-400">orderCount</span> = <span class="text-amber-300">SaloonOrder</span>::<span class="text-amber-300">count</span>();
    }

    <span class="text-yellow-400">#[Computed]</span>
    <span class="text-purple-400">public function</span> <span class="text-amber-300">drinks</span>()
    {
        <span class="text-purple-400">return</span> <span class="text-amber-300">SaloonDrink</span>::<span class="text-amber-300">available</span>()
            -&gt;<span class="text-amber-300">orderBy</span>(<span class="text-green-400">'sdk_type'</span>)
            -&gt;<span class="text-amber-300">get</span>();
    }

    <span class="text-purple-400">public function</span> <span class="text-amber-300">quickOrder</span>(): <span class="text-cyan-400">void</span>
    {
        <span class="text-orange-400">$drink</span> = <span class="text-amber-300">SaloonDrink</span>::<span class="text-amber-300">available</span>()
            -&gt;<span class="text-amber-300">inRandomOrder</span>()-&gt;<span class="text-amber-300">first</span>();

        <span class="text-amber-300">SaloonOrder</span>::<span class="text-amber-300">create</span>([
            <span class="text-green-400">'saloon_drink_sdk_id'</span> =&gt; <span class="text-orange-400">$drink</span>-&gt;<span class="text-orange-400">sdk_id</span>,
            <span class="text-green-400">'sor_customer_name'</span>  =&gt; <span class="text-green-400">'Forasteiro'</span>,
            <span class="text-green-400">'sor_quantity'</span>       =&gt; <span class="text-cyan-400">1</span>,
            <span class="text-green-400">'sor_total_price'</span>    =&gt; <span class="text-orange-400">$drink</span>-&gt;<span class="text-orange-400">sdk_price</span>,
            <span class="text-green-400">'sor_status'</span>         =&gt; <span class="text-green-400">'pending'</span>,
        ]);

        <span class="text-stone-500">// So essa linha causa re-render</span>
        <span class="text-stone-500">// Blaze so processa o node de $orderCount</span>
        <span class="text-orange-400">$this</span>-&gt;<span class="text-orange-400">orderCount</span> = <span class="text-amber-300">SaloonOrder</span>::<span class="text-amber-300">count</span>();
    }

    <span class="text-purple-400">public function</span> <span class="text-amber-300">placeOrder</span>(): <span class="text-cyan-400">void</span>
    {
        <span class="text-orange-400">$drink</span> = <span class="text-amber-300">SaloonDrink</span>::<span class="text-amber-300">find</span>(
            <span class="text-orange-400">$this</span>-&gt;<span class="text-orange-400">selectedDrinkId</span>
        );

        <span class="text-amber-300">SaloonOrder</span>::<span class="text-amber-300">create</span>([...]);
        <span class="text-orange-400">$this</span>-&gt;<span class="text-orange-400">newOrderModal</span> = <span class="text-cyan-400">false</span>;

        <span class="text-orange-400">$this</span>-&gt;<span class="text-amber-300">toast</span>()-&gt;<span class="text-amber-300">success</span>(
            <span class="text-green-400">'Pedido Registrado!'</span>, <span class="text-green-400">'...'</span>
        )-&gt;<span class="text-amber-300">send</span>();
    }
};</pre>
                </div>
            </div>
        </div>
    </template>
</div>
