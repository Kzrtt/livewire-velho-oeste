<div x-data="{ showCode: false, codeTab: 'blade' }">
    <div class="w-full max-w-6xl mx-auto space-y-5">
        {{-- Header --}}
        <div class="text-center space-y-2">
            <h2 class="text-2xl md:text-4xl font-bold text-stone-50">
                <i class="fad fa-city text-orange-500 mr-2"></i>
                Painel da <span class="text-orange-500">Cidade</span>
            </h2>
            <p class="text-sm text-stone-400">
                4 islands carregando <span class="text-orange-400">independentemente</span> &mdash; observe os tempos reais
            </p>
        </div>

        {{-- Islands grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- Island 1: Top Outlaws (light ~38 rows) --}}
            @island(lazy: true)
                @placeholder
                    <div class="rounded-xl bg-stone-800/60 border border-stone-700/50 overflow-hidden animate-pulse">
                        <div class="flex items-center gap-2 px-4 py-3 bg-stone-800/80 border-b border-stone-700/30">
                            <div class="w-4 h-4 rounded bg-stone-700"></div>
                            <div class="w-32 h-4 rounded bg-stone-700"></div>
                        </div>
                        <div class="p-4 space-y-3">
                            @for($i = 0; $i < 5; $i++)
                                <div class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-stone-700"></div>
                                    <div class="flex-1 h-3 rounded bg-stone-700"></div>
                                    <div class="w-16 h-3 rounded bg-stone-700"></div>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endplaceholder

                @php
                    $start = microtime(true);
                    $topOutlaws = \App\Models\Outlaw::with('gang')
                        ->orderByDesc('otl_danger_level')
                        ->orderByDesc('otl_bounty')
                        ->limit(5)
                        ->get();
                    $loadTime = round((microtime(true) - $start) * 1000, 1);
                @endphp

                <div class="rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
                    <div class="flex items-center justify-between px-4 py-3 bg-orange-500/10 border-b border-orange-500/20">
                        <div class="flex items-center gap-2">
                            <i class="fad fa-hat-cowboy text-orange-400 text-sm"></i>
                            <span class="text-xs font-bold text-orange-400">Top Procurados</span>
                        </div>
                        <span class="text-[10px] font-mono text-green-400 bg-green-500/10 px-2 py-0.5 rounded-full">{{ $loadTime }}ms</span>
                    </div>
                    <div class="p-4 space-y-2">
                        <div class="text-[9px] text-stone-600 font-mono mb-2">outlaws + gangs &bull; ~38 registros</div>
                        @foreach($topOutlaws as $outlaw)
                            <div class="flex items-center gap-3 text-xs">
                                <div class="flex gap-0.5">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fad fa-star text-[8px] {{ $i <= $outlaw->otl_danger_level ? 'text-red-500' : 'text-stone-700' }}"></i>
                                    @endfor
                                </div>
                                <span class="text-orange-400 font-bold truncate flex-1">"{{ $outlaw->otl_alias }}"</span>
                                @if($outlaw->gang)
                                    <span class="text-stone-600 text-[10px] truncate">{{ $outlaw->gang->gng_name }}</span>
                                @endif
                                <span class="text-amber-400 font-mono shrink-0">${{ number_format((float) $outlaw->otl_bounty, 0, '.', ',') }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endisland

            {{-- Island 2: Recent Orders (medium ~550 rows) --}}
            @island(lazy: true)
                @placeholder
                    <div class="rounded-xl bg-stone-800/60 border border-stone-700/50 overflow-hidden animate-pulse">
                        <div class="flex items-center gap-2 px-4 py-3 bg-stone-800/80 border-b border-stone-700/30">
                            <div class="w-4 h-4 rounded bg-stone-700"></div>
                            <div class="w-32 h-4 rounded bg-stone-700"></div>
                        </div>
                        <div class="p-4 space-y-3">
                            @for($i = 0; $i < 5; $i++)
                                <div class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-stone-700"></div>
                                    <div class="flex-1 h-3 rounded bg-stone-700"></div>
                                    <div class="w-16 h-3 rounded bg-stone-700"></div>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endplaceholder

                @php
                    $start = microtime(true);
                    $recentOrders = \App\Models\SaloonOrder::with(['drink', 'outlaw'])
                        ->orderByDesc('sor_created_at')
                        ->limit(5)
                        ->get();
                    $totalOrders = \App\Models\SaloonOrder::count();
                    $totalRevenue = \App\Models\SaloonOrder::sum('sor_total_price');
                    $loadTime = round((microtime(true) - $start) * 1000, 1);
                @endphp

                <div class="rounded-xl bg-stone-800/60 border border-amber-500/30 overflow-hidden">
                    <div class="flex items-center justify-between px-4 py-3 bg-amber-500/10 border-b border-amber-500/20">
                        <div class="flex items-center gap-2">
                            <i class="fad fa-glass-whiskey text-amber-400 text-sm"></i>
                            <span class="text-xs font-bold text-amber-400">Pedidos do Saloon</span>
                        </div>
                        <span class="text-[10px] font-mono text-green-400 bg-green-500/10 px-2 py-0.5 rounded-full">{{ $loadTime }}ms</span>
                    </div>
                    <div class="p-4 space-y-2">
                        <div class="text-[9px] text-stone-600 font-mono mb-2">orders + drinks + outlaws &bull; ~550 registros</div>
                        <div class="flex gap-4 mb-3 text-xs">
                            <div class="text-center">
                                <div class="text-lg font-black text-amber-400">{{ $totalOrders }}</div>
                                <div class="text-[9px] text-stone-500">pedidos</div>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-black text-green-400">${{ number_format((float) $totalRevenue, 0, '.', ',') }}</div>
                                <div class="text-[9px] text-stone-500">receita</div>
                            </div>
                        </div>
                        @foreach($recentOrders as $order)
                            <div class="flex items-center gap-2 text-xs">
                                <i class="fad fa-glass-whiskey text-amber-600 text-[10px]"></i>
                                <span class="text-stone-300 truncate flex-1">
                                    {{ $order->drink->sdk_name ?? '?' }}
                                    <span class="text-stone-600">x{{ $order->sor_quantity }}</span>
                                </span>
                                <span class="text-stone-500 text-[10px] truncate">{{ $order->sor_customer_name ?? $order->outlaw?->otl_alias ?? 'Anonimo' }}</span>
                                <span class="text-amber-400 font-mono shrink-0">${{ number_format((float) $order->sor_total_price, 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endisland

            {{-- Island 3: Sheriff Reports (heavy ~845 rows) --}}
            @island(lazy: true)
                @placeholder
                    <div class="rounded-xl bg-stone-800/60 border border-stone-700/50 overflow-hidden animate-pulse">
                        <div class="flex items-center gap-2 px-4 py-3 bg-stone-800/80 border-b border-stone-700/30">
                            <div class="w-4 h-4 rounded bg-stone-700"></div>
                            <div class="w-32 h-4 rounded bg-stone-700"></div>
                        </div>
                        <div class="p-4 space-y-3">
                            @for($i = 0; $i < 5; $i++)
                                <div class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-stone-700"></div>
                                    <div class="flex-1 h-3 rounded bg-stone-700"></div>
                                    <div class="w-16 h-3 rounded bg-stone-700"></div>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endplaceholder

                @php
                    $start = microtime(true);
                    $reports = \App\Models\SheriffReport::with(['outlaw', 'hunter'])
                        ->orderByDesc('shr_reported_at')
                        ->limit(5)
                        ->get();
                    $totalReports = \App\Models\SheriffReport::count();
                    $unresolvedReports = \App\Models\SheriffReport::where('shr_resolved', false)->count();
                    $loadTime = round((microtime(true) - $start) * 1000, 1);
                @endphp

                <div class="rounded-xl bg-stone-800/60 border border-blue-500/30 overflow-hidden">
                    <div class="flex items-center justify-between px-4 py-3 bg-blue-500/10 border-b border-blue-500/20">
                        <div class="flex items-center gap-2">
                            <i class="fad fa-file-alt text-blue-400 text-sm"></i>
                            <span class="text-xs font-bold text-blue-400">Relatorios do Xerife</span>
                        </div>
                        <span class="text-[10px] font-mono text-green-400 bg-green-500/10 px-2 py-0.5 rounded-full">{{ $loadTime }}ms</span>
                    </div>
                    <div class="p-4 space-y-2">
                        <div class="text-[9px] text-stone-600 font-mono mb-2">reports + outlaws + hunters &bull; ~845 registros</div>
                        <div class="flex gap-4 mb-3 text-xs">
                            <div class="text-center">
                                <div class="text-lg font-black text-blue-400">{{ $totalReports }}</div>
                                <div class="text-[9px] text-stone-500">relatorios</div>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-black text-red-400">{{ $unresolvedReports }}</div>
                                <div class="text-[9px] text-stone-500">pendentes</div>
                            </div>
                        </div>
                        @foreach($reports as $report)
                            <div class="flex items-center gap-2 text-xs">
                                @php
                                    $typeColors = ['sighting' => 'text-amber-400', 'capture' => 'text-green-400', 'escape' => 'text-red-400', 'incident' => 'text-orange-400', 'patrol' => 'text-blue-400'];
                                @endphp
                                <span class="text-[9px] font-mono {{ $typeColors[$report->shr_type] ?? 'text-stone-400' }} uppercase shrink-0">{{ $report->shr_type }}</span>
                                <span class="text-stone-300 truncate flex-1">{{ $report->shr_title }}</span>
                                @if($report->hunter)
                                    <span class="text-stone-600 text-[10px] truncate">{{ $report->hunter->bht_alias ?? $report->hunter->bht_name }}</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endisland

            {{-- Island 4: Town Events (heaviest ~2000 rows) --}}
            @island(lazy: true)
                @placeholder
                    <div class="rounded-xl bg-stone-800/60 border border-stone-700/50 overflow-hidden animate-pulse">
                        <div class="flex items-center gap-2 px-4 py-3 bg-stone-800/80 border-b border-stone-700/30">
                            <div class="w-4 h-4 rounded bg-stone-700"></div>
                            <div class="w-32 h-4 rounded bg-stone-700"></div>
                        </div>
                        <div class="p-4 space-y-3">
                            @for($i = 0; $i < 5; $i++)
                                <div class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-stone-700"></div>
                                    <div class="flex-1 h-3 rounded bg-stone-700"></div>
                                    <div class="w-16 h-3 rounded bg-stone-700"></div>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endplaceholder

                @php
                    $start = microtime(true);
                    $events = \App\Models\TownEvent::with('outlaw')
                        ->orderByDesc('tev_happened_at')
                        ->limit(5)
                        ->get();
                    $totalEvents = \App\Models\TownEvent::count();
                    $criticalEvents = \App\Models\TownEvent::where('tev_severity', 'critical')->where('tev_resolved', false)->count();
                    $loadTime = round((microtime(true) - $start) * 1000, 1);
                @endphp

                <div class="rounded-xl bg-stone-800/60 border border-purple-500/30 overflow-hidden">
                    <div class="flex items-center justify-between px-4 py-3 bg-purple-500/10 border-b border-purple-500/20">
                        <div class="flex items-center gap-2">
                            <i class="fad fa-newspaper text-purple-400 text-sm"></i>
                            <span class="text-xs font-bold text-purple-400">Feed de Eventos</span>
                        </div>
                        <span class="text-[10px] font-mono text-green-400 bg-green-500/10 px-2 py-0.5 rounded-full">{{ $loadTime }}ms</span>
                    </div>
                    <div class="p-4 space-y-2">
                        <div class="text-[9px] text-stone-600 font-mono mb-2">events + outlaws &bull; ~2000 registros</div>
                        <div class="flex gap-4 mb-3 text-xs">
                            <div class="text-center">
                                <div class="text-lg font-black text-purple-400">{{ $totalEvents }}</div>
                                <div class="text-[9px] text-stone-500">eventos</div>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-black text-red-400">{{ $criticalEvents }}</div>
                                <div class="text-[9px] text-stone-500">criticos</div>
                            </div>
                        </div>
                        @foreach($events as $event)
                            <div class="flex items-center gap-2 text-xs">
                                @php
                                    $sevColors = ['low' => 'bg-green-500', 'medium' => 'bg-yellow-500', 'high' => 'bg-orange-500', 'critical' => 'bg-red-500'];
                                @endphp
                                <div class="w-1.5 h-1.5 rounded-full {{ $sevColors[$event->tev_severity] ?? 'bg-stone-500' }} shrink-0"></div>
                                <span class="text-stone-300 truncate flex-1">{{ $event->tev_title }}</span>
                                @if($event->outlaw)
                                    <span class="text-stone-600 text-[10px] truncate">"{{ $event->outlaw->otl_alias }}"</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endisland

        </div>

        {{-- Bottom controls --}}
        <div class="flex flex-col md:flex-row items-center justify-center gap-3">
            <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-orange-500/10 border border-orange-500/30">
                <i class="fad fa-island-tropical text-orange-400 text-sm"></i>
                <span class="text-xs text-orange-400">Cada island carrega <span class="font-bold">independentemente</span> — tempo depende da query real</span>
            </div>
            <button
                x-on:click="showCode = true"
                class="flex items-center gap-2 px-4 py-2 rounded-full bg-stone-800/60 border border-stone-700/50 text-xs text-stone-300 hover:text-orange-400 hover:border-orange-500/50 transition-colors cursor-pointer"
            >
                <i class="fad fa-code"></i>
                <span>Codigo</span>
            </button>
        </div>
    </div>

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
                        <i class="fad fa-code text-orange-500 mr-2"></i>Codigo — Town Dashboard (Islands)
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
<pre class="text-stone-300"><span class="text-stone-500">{{-- 4 islands, cada uma carrega independentemente --}}</span>

<span class="text-stone-500">{{-- Island 1: Leve (~38 rows) --}}</span>
<span class="text-orange-400">@<!-- -->@islandland</span>(lazy: true)
    <span class="text-orange-400">@@placeholder</span>
        &lt;<span class="text-amber-300">div</span> <span class="text-orange-400">class</span>=<span class="text-green-400">"animate-pulse"</span>&gt;
            <span class="text-stone-500">{{-- skeleton loading --}}</span>
        &lt;/<span class="text-amber-300">div</span>&gt;
    <span class="text-orange-400">@@endplaceholder</span>

    <span class="text-purple-400">@@php</span>
        $outlaws = Outlaw::<span class="text-amber-300">with</span>(<span class="text-green-400">'gang'</span>)
            -&gt;<span class="text-amber-300">orderByDesc</span>(<span class="text-green-400">'otl_danger_level'</span>)
            -&gt;<span class="text-amber-300">limit</span>(<span class="text-cyan-400">5</span>)-&gt;<span class="text-amber-300">get</span>();
    <span class="text-purple-400">@@endphp</span>

    <span class="text-stone-500">{{-- render outlaws --}}</span>
<span class="text-orange-400">@@endisland</span>

<span class="text-stone-500">{{-- Island 2: Media (~550 rows) --}}</span>
<span class="text-orange-400">@<!-- -->@islandland</span>(lazy: true)
    <span class="text-orange-400">@@placeholder</span> ... <span class="text-orange-400">@@endplaceholder</span>
    SaloonOrder::<span class="text-amber-300">with</span>([<span class="text-green-400">'drink'</span>, <span class="text-green-400">'outlaw'</span>])...
<span class="text-orange-400">@@endisland</span>

<span class="text-stone-500">{{-- Island 3: Pesada (~845 rows) --}}</span>
<span class="text-orange-400">@<!-- -->@islandland</span>(lazy: true)
    <span class="text-orange-400">@@placeholder</span> ... <span class="text-orange-400">@@endplaceholder</span>
    SheriffReport::<span class="text-amber-300">with</span>([<span class="text-green-400">'outlaw'</span>, <span class="text-green-400">'hunter'</span>])...
<span class="text-orange-400">@@endisland</span>

<span class="text-stone-500">{{-- Island 4: Mais pesada (~2000 rows) --}}</span>
<span class="text-orange-400">@<!-- -->@islandland</span>(lazy: true)
    <span class="text-orange-400">@@placeholder</span> ... <span class="text-orange-400">@@endplaceholder</span>
    TownEvent::<span class="text-amber-300">with</span>(<span class="text-green-400">'outlaw'</span>)-&gt;<span class="text-amber-300">count</span>()...
<span class="text-orange-400">@@endisland</span>

<span class="text-stone-500">{{-- Cada @<!-- -->@islandland carrega via lazy (wire:intersect) --}}</span>
<span class="text-stone-500">{{-- Mostra @@placeholder primeiro, depois substitui --}}</span>
<span class="text-stone-500">{{-- Tempo real depende do volume de dados --}}</span></pre>
                </div>

                {{-- PHP tab --}}
                <div x-show="codeTab === 'php'" class="rounded-xl bg-stone-800/60 border border-stone-700/50 p-5 font-mono text-xs leading-relaxed overflow-x-auto">
<pre class="text-stone-300"><span class="text-stone-500">// O componente PHP e minimo!</span>
<span class="text-stone-500">// Islands nao precisam de estado no componente.</span>
<span class="text-stone-500">// As queries rodam DENTRO de cada island via @@php.</span>

<span class="text-purple-400">use</span> <span class="text-amber-300">Livewire\Component</span>;

<span class="text-purple-400">new class extends</span> <span class="text-amber-300">Component</span>
{
    <span class="text-stone-500">// Sem propriedades!</span>
    <span class="text-stone-500">// Sem metodos!</span>
    <span class="text-stone-500">// Toda a logica fica nos @<!-- -->@islandland blocks.</span>
};

<span class="text-stone-500">// ----</span>
<span class="text-stone-500">// Dentro de cada @<!-- -->@islandland, usa-se @@php:</span>

<span class="text-purple-400">@@php</span>
    <span class="text-orange-400">$start</span> = <span class="text-amber-300">microtime</span>(<span class="text-cyan-400">true</span>);

    <span class="text-orange-400">$outlaws</span> = \<span class="text-amber-300">App\Models\Outlaw</span>::<span class="text-amber-300">with</span>(<span class="text-green-400">'gang'</span>)
        -&gt;<span class="text-amber-300">orderByDesc</span>(<span class="text-green-400">'otl_danger_level'</span>)
        -&gt;<span class="text-amber-300">limit</span>(<span class="text-cyan-400">5</span>)
        -&gt;<span class="text-amber-300">get</span>();

    <span class="text-orange-400">$loadTime</span> = <span class="text-amber-300">round</span>(
        (<span class="text-amber-300">microtime</span>(<span class="text-cyan-400">true</span>) - <span class="text-orange-400">$start</span>) * <span class="text-cyan-400">1000</span>, <span class="text-cyan-400">1</span>
    );
<span class="text-purple-400">@@endphp</span>

<span class="text-stone-500">// Cada island mede seu proprio tempo real</span>
<span class="text-stone-500">// Sem sleep() artificial!</span>
<span class="text-stone-500">// Volume dos dados determina a velocidade:</span>
<span class="text-stone-500">//   outlaws:  ~38 rows  → rapido</span>
<span class="text-stone-500">//   orders:  ~550 rows  → moderado</span>
<span class="text-stone-500">//   reports: ~845 rows  → lento</span>
<span class="text-stone-500">//   events: ~2000 rows  → mais lento</span></pre>
                </div>
            </div>
        </div>
    </template>
</div>
