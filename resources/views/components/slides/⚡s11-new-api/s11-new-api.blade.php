<div
    x-data="{ showDemo: false }"
    x-effect="$dispatch('slide-navigation', { enabled: !showDemo })"
    class="w-full max-w-5xl mx-auto space-y-8 py-4"
>
    {{-- Toggle button --}}
    <div class="flex justify-end">
        <button
            x-on:click="showDemo = !showDemo"
            class="px-4 py-2 rounded-lg bg-orange-500/20 border border-orange-500/40 text-orange-400 text-sm font-bold hover:bg-orange-500/30 transition-colors cursor-pointer flex items-center gap-2"
        >
            <i class="fad fa-exchange-alt"></i>
            <span x-text="showDemo ? 'Ver Conteudo' : 'Ver Caso de Uso'"></span>
        </button>
    </div>

    {{-- Slide content --}}
    <div x-show="!showDemo" x-transition:enter.duration.300ms x-transition:leave.duration.200ms class="space-y-8">

    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            Nova <span class="text-orange-500">API</span> para Frontend
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            <span class="text-amber-400 font-mono">this.</span> no lugar de <span class="text-red-400 font-mono line-through">$wire</span>
        </p>
    </div>

    {{-- Code comparison --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 fade-up-2">
        {{-- Before ($wire) --}}
        <div class="rounded-xl bg-stone-800/60 border border-red-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                <i class="fad fa-dollar-sign text-red-400 text-sm"></i>
                <span class="text-xs font-bold text-red-400">Livewire 3 &mdash; $wire</span>
            </div>
            <div class="p-4 font-mono text-[11px] leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">// Acessar propriedade</span></div>
                <div><span class="text-red-400">$wire</span>.<span class="text-stone-300">count</span></div>
                <div class="mt-2"><span class="text-stone-500">// Chamar metodo</span></div>
                <div><span class="text-red-400">$wire</span>.<span class="text-stone-300">increment</span>()</div>
                <div class="mt-2"><span class="text-stone-500">// Entangle (sync bidirecional)</span></div>
                <div><span class="text-red-400">$wire</span>.<span class="text-stone-300">entangle</span>(<span class="text-green-400">'search'</span>)</div>
                <div class="mt-2"><span class="text-stone-500">// Ouvir evento</span></div>
                <div><span class="text-red-400">$wire</span>.<span class="text-stone-300">on</span>(<span class="text-green-400">'saved'</span>, () =&gt; {</div>
                <div class="pl-4"><span class="text-stone-300">alert</span>(<span class="text-green-400">'OK'</span>)</div>
                <div>})</div>
                <div class="mt-3 text-red-400 text-[10px]">// $wire e unico do Livewire</div>
                <div class="text-red-400 text-[10px]">// nao parece JS nem PHP</div>
            </div>
        </div>

        {{-- After (this.) --}}
        <div class="rounded-xl bg-stone-800/60 border border-green-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-green-500/10 border-b border-green-500/20">
                <i class="fad fa-terminal text-green-400 text-sm"></i>
                <span class="text-xs font-bold text-green-400">Livewire 4 &mdash; this.</span>
            </div>
            <div class="p-4 font-mono text-[11px] leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">// Acessar propriedade</span></div>
                <div><span class="text-green-400">this</span>.<span class="text-stone-300">count</span></div>
                <div class="mt-2"><span class="text-stone-500">// Chamar metodo</span></div>
                <div><span class="text-green-400">this</span>.<span class="text-stone-300">increment</span>()</div>
                <div class="mt-2"><span class="text-stone-500">// Entangle nativo</span></div>
                <div><span class="text-green-400">this</span>.<span class="text-stone-300">search</span></div>
                <div class="mt-2"><span class="text-stone-500">// Ouvir evento</span></div>
                <div><span class="text-green-400">this</span>.<span class="text-stone-300">on</span>(<span class="text-green-400">'saved'</span>, () =&gt; {</div>
                <div class="pl-4"><span class="text-stone-300">alert</span>(<span class="text-green-400">'OK'</span>)</div>
                <div>})</div>
                <div class="mt-3 text-green-400 text-[10px]">// Familiar para qualquer dev JS</div>
                <div class="text-green-400 text-[10px]">// mesma API de Alpine, Vue, etc.</div>
            </div>
        </div>
    </div>

    {{-- Alpine.js integration example --}}
    <div class="fade-up-3 rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
        <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
            <i class="fad fa-mountain text-orange-400 text-sm"></i>
            <span class="text-xs font-bold text-orange-400">Integracao com Alpine.js</span>
        </div>
        <div class="p-4 font-mono text-[11px] leading-relaxed overflow-x-hidden">
            <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">x-data</span>=<span class="text-green-400">"{ localFilter: <span class="text-orange-300">this</span>.filter }"</span>&gt;</div>
            <div class="pl-4">&lt;<span class="text-amber-300">input</span></div>
            <div class="pl-8"><span class="text-orange-400">x-model</span>=<span class="text-green-400">"localFilter"</span></div>
            <div class="pl-8"><span class="text-orange-400">@@change</span>=<span class="text-green-400">"<span class="text-orange-300">this</span>.filter = localFilter"</span></div>
            <div class="pl-4">/&gt;</div>
            <div class="pl-4">&lt;<span class="text-amber-300">button</span> <span class="text-orange-400">@@click</span>=<span class="text-green-400">"<span class="text-orange-300">this</span>.search()"</span>&gt;Buscar&lt;/<span class="text-amber-300">button</span>&gt;</div>
            <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
        </div>
    </div>

    {{-- Bottom note --}}
    <div class="text-center fade-up-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-stone-800/50 border border-stone-700/30 text-sm text-stone-400">
            <i class="fad fa-bolt text-orange-500/70"></i>
            Uma API &mdash; dois mundos: PHP no servidor, JS no cliente
        </div>
    </div>

    </div>{{-- end x-show="!showDemo" --}}

    {{-- Use case demo --}}
    <div x-show="showDemo" x-transition:enter.duration.300ms x-transition:leave.duration.200ms x-cloak>
        @livewire('api-showdown')
    </div>
</div>
