<div class="w-full max-w-5xl mx-auto space-y-6 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            <i class="fad fa-fire text-orange-500"></i>
            <span class="text-orange-500">Blaze</span>
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            Render inteligente &mdash; so processa o que muda
        </p>
    </div>

    {{-- Comparison: Before vs After with a more complete template --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 fade-up-2">
        {{-- Before (Livewire 3) --}}
        <div class="rounded-xl bg-stone-800/60 border border-red-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                <i class="fad fa-times text-red-400 text-sm"></i>
                <span class="text-xs font-bold text-red-400">Livewire 3</span>
                <span class="text-[10px] text-stone-500 ml-auto">Re-render completo</span>
            </div>
            <div class="p-4 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">// Todo o template e re-renderizado no servidor</span></div>
                <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">class</span>=<span class="text-green-400">"dashboard"</span>&gt;</div>
                <div class="pl-4 bg-red-500/10 rounded">&lt;<span class="text-amber-300">header</span>&gt;Logo + Nav&lt;/<span class="text-amber-300">header</span>&gt;</div>
                <div class="pl-4 bg-red-500/10 rounded">&lt;<span class="text-amber-300">aside</span>&gt;Sidebar com 12 links&lt;/<span class="text-amber-300">aside</span>&gt;</div>
                <div class="pl-4 bg-red-500/10 rounded">&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">class</span>=<span class="text-green-400">"stats"</span>&gt;</div>
                <div class="pl-8 bg-red-500/10 rounded">&lt;<span class="text-amber-300">h2</span>&gt;Estatisticas&lt;/<span class="text-amber-300">h2</span>&gt;</div>
                <div class="pl-8 bg-red-500/10 rounded">&lt;<span class="text-amber-300">div</span>&gt;Grafico SVG (50 nodes)&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="pl-8 bg-red-500/10 rounded">&lt;<span class="text-amber-300">span</span>&gt;@{{ $totalUsers }}&lt;/<span class="text-amber-300">span</span>&gt;</div>
                <div class="pl-4 bg-red-500/10 rounded">&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="pl-4 bg-red-500/10 rounded">&lt;<span class="text-amber-300">table</span>&gt;20 rows de dados&lt;/<span class="text-amber-300">table</span>&gt;</div>
                <div class="pl-4 bg-red-500/10 rounded">&lt;<span class="text-amber-300">footer</span>&gt;Copyright 2026&lt;/<span class="text-amber-300">footer</span>&gt;</div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="mt-2 text-red-400 font-bold">~80+ nodes processados</div>
                <div class="text-red-400">so $totalUsers mudou!</div>
            </div>
        </div>

        {{-- After (Livewire 4 + Blaze) --}}
        <div class="rounded-xl bg-stone-800/60 border border-green-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-green-500/10 border-b border-green-500/20">
                <i class="fad fa-check text-green-400 text-sm"></i>
                <span class="text-xs font-bold text-green-400">Livewire 4 + Blaze</span>
                <span class="text-[10px] text-stone-500 ml-auto">Render seletivo</span>
            </div>
            <div class="p-4 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">// Blaze identifica e pula partes estaticas</span></div>
                <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">class</span>=<span class="text-green-400">"dashboard"</span>&gt;</div>
                <div class="pl-4 text-stone-600">&lt;header&gt;...&lt;/header&gt; <span class="text-stone-700 text-[9px]">SKIP</span></div>
                <div class="pl-4 text-stone-600">&lt;aside&gt;...&lt;/aside&gt; <span class="text-stone-700 text-[9px]">SKIP</span></div>
                <div class="pl-4 text-stone-600">&lt;div class="stats"&gt;</div>
                <div class="pl-8 text-stone-600">&lt;h2&gt;...&lt;/h2&gt; <span class="text-stone-700 text-[9px]">SKIP</span></div>
                <div class="pl-8 text-stone-600">&lt;div&gt;SVG...&lt;/div&gt; <span class="text-stone-700 text-[9px]">SKIP</span></div>
                <div class="pl-8 bg-green-500/10 rounded">&lt;<span class="text-amber-300">span</span>&gt;@{{ $totalUsers }}&lt;/<span class="text-amber-300">span</span>&gt; <span class="text-green-400 text-[9px]">RENDER</span></div>
                <div class="pl-4 text-stone-600">&lt;/div&gt;</div>
                <div class="pl-4 text-stone-600">&lt;table&gt;...&lt;/table&gt; <span class="text-stone-700 text-[9px]">SKIP</span></div>
                <div class="pl-4 text-stone-600">&lt;footer&gt;...&lt;/footer&gt; <span class="text-stone-700 text-[9px]">SKIP</span></div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="mt-2 text-green-400 font-bold">~1 node processado</div>
                <div class="text-green-400">99% do template ignorado!</div>
            </div>
        </div>
    </div>

    {{-- How Blaze works - explanatory card --}}
    <div class="fade-up-3 rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
        <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
            <i class="fad fa-cogs text-orange-400 text-sm"></i>
            <span class="text-xs font-bold text-orange-400">Como o Blaze funciona?</span>
        </div>
        <div class="p-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                {{-- Step 1 --}}
                <div class="text-center space-y-2">
                    <div class="w-10 h-10 rounded-full bg-orange-500/20 border border-orange-500/40 flex items-center justify-center mx-auto">
                        <span class="text-orange-400 font-bold text-sm">1</span>
                    </div>
                    <p class="text-xs font-bold text-stone-100">Analise em Compile-Time</p>
                    <p class="text-[10px] text-stone-400">Blaze analisa o template Blade na compilacao e identifica quais partes sao <span class="text-orange-300">estaticas</span> e quais dependem de <span class="text-amber-300">variaveis</span></p>
                </div>
                {{-- Step 2 --}}
                <div class="text-center space-y-2">
                    <div class="w-10 h-10 rounded-full bg-orange-500/20 border border-orange-500/40 flex items-center justify-center mx-auto">
                        <span class="text-orange-400 font-bold text-sm">2</span>
                    </div>
                    <p class="text-xs font-bold text-stone-100">Mapa de Regioes</p>
                    <p class="text-[10px] text-stone-400">Cria um mapa interno separando as <span class="text-stone-600">zonas mortas</span> (HTML fixo) das <span class="text-green-400">zonas vivas</span> (com dados dinamicos)</p>
                </div>
                {{-- Step 3 --}}
                <div class="text-center space-y-2">
                    <div class="w-10 h-10 rounded-full bg-orange-500/20 border border-orange-500/40 flex items-center justify-center mx-auto">
                        <span class="text-orange-400 font-bold text-sm">3</span>
                    </div>
                    <p class="text-xs font-bold text-stone-100">Render Parcial</p>
                    <p class="text-[10px] text-stone-400">Na requisicao, o servidor <span class="text-red-400">pula</span> as zonas mortas e so renderiza as zonas vivas que possuem dados alterados</p>
                </div>
                {{-- Step 4 --}}
                <div class="text-center space-y-2">
                    <div class="w-10 h-10 rounded-full bg-orange-500/20 border border-orange-500/40 flex items-center justify-center mx-auto">
                        <span class="text-orange-400 font-bold text-sm">4</span>
                    </div>
                    <p class="text-xs font-bold text-stone-100">Morph Cirurgico</p>
                    <p class="text-[10px] text-stone-400">O DOM diff so recebe os fragmentos alterados, fazendo um <span class="text-green-400">patch minimo</span> na interface do usuario</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Key points --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 fade-up-4">
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-stopwatch text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">Menos CPU no Servidor</p>
                <p class="text-[11px] text-stone-400">Pula nodes estaticos na arvore de render</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-bolt text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">Zero Config</p>
                <p class="text-[11px] text-stone-400">Ativado automaticamente no Livewire 4</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-tachometer-alt text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">Quanto Maior, Melhor</p>
                <p class="text-[11px] text-stone-400">Templates grandes com poucos dados dinamicos ganham mais</p>
            </div>
        </div>
    </div>
</div>
