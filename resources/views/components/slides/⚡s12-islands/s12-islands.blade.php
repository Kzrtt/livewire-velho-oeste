<div class="w-full max-w-5xl mx-auto space-y-6 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            <i class="fad fa-island-tropical text-orange-500"></i>
            <span class="text-orange-500">Islands</span>
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            Isole blocos pesados &mdash; carregue sob demanda
        </p>
    </div>

    {{-- Problem illustration --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 fade-up-2">
        {{-- Before: everything loads at once --}}
        <div class="rounded-xl bg-stone-800/60 border border-red-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                <i class="fad fa-times text-red-400 text-sm"></i>
                <span class="text-xs font-bold text-red-400">Livewire 3 &mdash; Tudo de Uma Vez</span>
            </div>
            <div class="p-4 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                <div class="text-stone-500">// Dashboard carrega TUDO no primeiro request</div>
                <div>&lt;<span class="text-amber-300">div</span>&gt;</div>
                <div class="pl-4 bg-red-500/10 rounded py-0.5">&lt;<span class="text-amber-300">livewire:header</span> /&gt; <span class="text-stone-500">rapido</span></div>
                <div class="pl-4 bg-red-500/10 rounded py-0.5">&lt;<span class="text-amber-300">livewire:stats-chart</span> /&gt; <span class="text-red-400">pesado!</span></div>
                <div class="pl-4 bg-red-500/10 rounded py-0.5">&lt;<span class="text-amber-300">livewire:user-table</span> /&gt; <span class="text-red-400">pesado!</span></div>
                <div class="pl-4 bg-red-500/10 rounded py-0.5">&lt;<span class="text-amber-300">livewire:activity-feed</span> /&gt; <span class="text-red-400">pesado!</span></div>
                <div class="pl-4 bg-red-500/10 rounded py-0.5">&lt;<span class="text-amber-300">livewire:footer</span> /&gt; <span class="text-stone-500">rapido</span></div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="mt-2 text-red-400 font-bold">Primeiro paint: ~2.5s</div>
                <div class="text-red-400">Usuario espera TUDO carregar</div>
            </div>
        </div>

        {{-- After: islands with lazy loading --}}
        <div class="rounded-xl bg-stone-800/60 border border-green-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-green-500/10 border-b border-green-500/20">
                <i class="fad fa-check text-green-400 text-sm"></i>
                <span class="text-xs font-bold text-green-400">Livewire 4 &mdash; Islands</span>
            </div>
            <div class="p-4 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                <div class="text-stone-500">// Islands carregam componentes sob demanda</div>
                <div>&lt;<span class="text-amber-300">div</span>&gt;</div>
                <div class="pl-4 bg-green-500/5 rounded py-0.5">&lt;<span class="text-amber-300">livewire:header</span> /&gt; <span class="text-green-400">instant</span></div>
                <div class="pl-4 bg-amber-500/10 rounded py-0.5"><span class="text-orange-400">@<!-- -->island</span></div>
                <div class="pl-8">&lt;<span class="text-amber-300">livewire:stats-chart</span> /&gt; <span class="text-amber-400">lazy</span></div>
                <div class="pl-4"><span class="text-orange-400">@@endisland</span></div>
                <div class="pl-4 bg-amber-500/10 rounded py-0.5"><span class="text-orange-400">@<!-- -->island</span></div>
                <div class="pl-8">&lt;<span class="text-amber-300">livewire:user-table</span> /&gt; <span class="text-amber-400">lazy</span></div>
                <div class="pl-4"><span class="text-orange-400">@@endisland</span></div>
                <div class="pl-4 bg-amber-500/10 rounded py-0.5"><span class="text-orange-400">@<!-- -->island</span></div>
                <div class="pl-8">&lt;<span class="text-amber-300">livewire:activity-feed</span> /&gt; <span class="text-amber-400">lazy</span></div>
                <div class="pl-4"><span class="text-orange-400">@@endisland</span></div>
                <div class="pl-4 bg-green-500/5 rounded py-0.5">&lt;<span class="text-amber-300">livewire:footer</span> /&gt; <span class="text-green-400">instant</span></div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="mt-2 text-green-400 font-bold">Primeiro paint: ~200ms</div>
                <div class="text-green-400">Componentes pesados carregam depois</div>
            </div>
        </div>
    </div>

    {{-- How Islands work --}}
    <div class="fade-up-3 rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
        <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
            <i class="fad fa-lightbulb text-orange-400 text-sm"></i>
            <span class="text-xs font-bold text-orange-400">Como funciona na pratica?</span>
        </div>
        <div class="p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="text-center space-y-2">
                <div class="w-10 h-10 rounded-full bg-green-500/20 border border-green-500/40 flex items-center justify-center mx-auto">
                    <i class="fad fa-rocket text-green-400 text-sm"></i>
                </div>
                <p class="text-xs font-bold text-stone-100">1. Render Inicial Leve</p>
                <p class="text-[10px] text-stone-400">O servidor envia a pagina com <span class="text-green-400">placeholders</span> no lugar dos islands. O usuario ve a interface rapidamente.</p>
            </div>
            <div class="text-center space-y-2">
                <div class="w-10 h-10 rounded-full bg-amber-500/20 border border-amber-500/40 flex items-center justify-center mx-auto">
                    <i class="fad fa-spinner text-amber-400 text-sm"></i>
                </div>
                <p class="text-xs font-bold text-stone-100">2. Lazy Loading</p>
                <p class="text-[10px] text-stone-400">Cada @<!-- -->island dispara um request <span class="text-amber-400">independente</span> para carregar o componente pesado em background.</p>
            </div>
            <div class="text-center space-y-2">
                <div class="w-10 h-10 rounded-full bg-orange-500/20 border border-orange-500/40 flex items-center justify-center mx-auto">
                    <i class="fad fa-puzzle-piece text-orange-400 text-sm"></i>
                </div>
                <p class="text-xs font-bold text-stone-100">3. Hidratacao Isolada</p>
                <p class="text-[10px] text-stone-400">Cada island tem seu <span class="text-orange-400">proprio ciclo de vida</span>. Atualizar um nao afeta os outros.</p>
            </div>
        </div>
    </div>

    {{-- Benefits --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 fade-up-4">
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-tachometer-alt text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">TTFB Menor</p>
                <p class="text-[11px] text-stone-400">Pagina aparece antes para o usuario</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-shield-alt text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">Isolamento</p>
                <p class="text-[11px] text-stone-400">Um island lento nao trava os outros</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-code text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">@<!-- -->island / @@endisland</p>
                <p class="text-[11px] text-stone-400">Sintaxe simples, sem config extra</p>
            </div>
        </div>
    </div>
</div>
