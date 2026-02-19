<div class="w-full max-w-5xl mx-auto space-y-6 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            <span class="text-orange-500">SPA-Like</span> Nativo
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            Navegacao sem reload &mdash; experiencia de Single Page App no Livewire
        </p>
    </div>

    {{-- Before vs After --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 fade-up-2">
        {{-- Before: full page reload --}}
        <div class="rounded-xl bg-stone-800/60 border border-red-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                <i class="fad fa-times text-red-400 text-sm"></i>
                <span class="text-xs font-bold text-red-400">Livewire 3 &mdash; Full Page Reload</span>
            </div>
            <div class="p-4 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                <div class="text-stone-500">// Clicar em link = recarregar tudo</div>
                <div>&lt;<span class="text-amber-300">a</span> <span class="text-orange-400">href</span>=<span class="text-green-400">"/dashboard"</span>&gt;Dashboard&lt;/<span class="text-amber-300">a</span>&gt;</div>
                <div class="mt-2 text-stone-500">// Fluxo:</div>
                <div class="mt-1 flex items-center gap-1 flex-wrap">
                    <span class="text-stone-300">Click</span>
                    <i class="fad fa-long-arrow-right text-red-400 text-[9px]"></i>
                    <span class="text-red-400">Tela branca</span>
                    <i class="fad fa-long-arrow-right text-red-400 text-[9px]"></i>
                    <span class="text-red-400">HTML completo</span>
                </div>
                <div class="flex items-center gap-1 flex-wrap">
                    <i class="fad fa-long-arrow-right text-red-400 text-[9px]"></i>
                    <span class="text-red-400">CSS/JS reload</span>
                    <i class="fad fa-long-arrow-right text-red-400 text-[9px]"></i>
                    <span class="text-stone-300">Renderizado</span>
                </div>
                <div class="mt-3 space-y-1">
                    <div class="flex items-center gap-2">
                        <i class="fad fa-times-circle text-red-400 text-xs"></i>
                        <span class="text-stone-400">Flash de tela branca</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fad fa-times-circle text-red-400 text-xs"></i>
                        <span class="text-stone-400">Perde estado do JS/Alpine</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fad fa-times-circle text-red-400 text-xs"></i>
                        <span class="text-stone-400">Re-download de assets</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- After: SPA-like --}}
        <div class="rounded-xl bg-stone-800/60 border border-green-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-green-500/10 border-b border-green-500/20">
                <i class="fad fa-check text-green-400 text-sm"></i>
                <span class="text-xs font-bold text-green-400">Livewire 4 &mdash; SPA-Like</span>
            </div>
            <div class="p-4 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                <div class="text-stone-500">// Mesmo link, magia por baixo</div>
                <div>&lt;<span class="text-amber-300">a</span> <span class="text-orange-400">href</span>=<span class="text-green-400">"/dashboard"</span>&gt;Dashboard&lt;/<span class="text-amber-300">a</span>&gt;</div>
                <div class="mt-2 text-stone-500">// Fluxo (automatico!):</div>
                <div class="mt-1 flex items-center gap-1 flex-wrap">
                    <span class="text-stone-300">Click</span>
                    <i class="fad fa-long-arrow-right text-green-400 text-[9px]"></i>
                    <span class="text-green-400">AJAX fetch</span>
                    <i class="fad fa-long-arrow-right text-green-400 text-[9px]"></i>
                    <span class="text-green-400">Morph HTML</span>
                </div>
                <div class="flex items-center gap-1 flex-wrap">
                    <i class="fad fa-long-arrow-right text-green-400 text-[9px]"></i>
                    <span class="text-green-400">pushState</span>
                    <i class="fad fa-long-arrow-right text-green-400 text-[9px]"></i>
                    <span class="text-stone-300">Transicao suave</span>
                </div>
                <div class="mt-3 space-y-1">
                    <div class="flex items-center gap-2">
                        <i class="fad fa-check-circle text-green-400 text-xs"></i>
                        <span class="text-stone-400">Sem flash de tela branca</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fad fa-check-circle text-green-400 text-xs"></i>
                        <span class="text-stone-400">Mantem estado JS/Alpine</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fad fa-check-circle text-green-400 text-xs"></i>
                        <span class="text-stone-400">Assets carregam uma vez</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Live example: this presentation --}}
    <div class="fade-up-3 rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
        <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
            <i class="fad fa-hat-cowboy text-orange-400 text-sm"></i>
            <span class="text-xs font-bold text-orange-400">Prova viva &mdash; esta apresentacao!</span>
        </div>
        <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="space-y-3">
                <p class="text-sm text-stone-300">Este site de slides usa <span class="text-orange-400 font-bold">SPA-Like nativo</span> do Livewire 4.</p>
                <p class="text-xs text-stone-400">Quando voce navega entre slides com as setas, a pagina <span class="text-green-400">nao recarrega</span>. O Livewire intercepta a navegacao, faz fetch via AJAX e aplica morph no DOM.</p>
                <p class="text-xs text-stone-400">Resultado: transicoes suaves, sem perda de estado, e a barra de progresso atualiza <span class="text-amber-400">instantaneamente</span>.</p>
            </div>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                <div class="text-stone-500">// routes/web.php</div>
                <div>Route::<span class="text-amber-300">livewire</span>(</div>
                <div class="pl-4"><span class="text-green-400">'/slide/1'</span>,</div>
                <div class="pl-4"><span class="text-green-400">'slides.s01-cover'</span></div>
                <div>);</div>
                <div class="mt-1">Route::<span class="text-amber-300">livewire</span>(</div>
                <div class="pl-4"><span class="text-green-400">'/slide/2'</span>,</div>
                <div class="pl-4"><span class="text-green-400">'slides.s02-about-me'</span></div>
                <div>);</div>
                <div class="mt-1 text-stone-500">// ... cada slide e uma rota</div>
                <div class="mt-2 text-green-400">// Livewire intercepta links</div>
                <div class="text-green-400">// entre rotas automaticamente!</div>
            </div>
        </div>
    </div>

    {{-- Key features --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 fade-up-4">
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-magic text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">Zero Config</p>
                <p class="text-[11px] text-stone-400">Links normais, sem wire:navigate</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-history text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">History API</p>
                <p class="text-[11px] text-stone-400">Back/forward funcionam normalmente</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-bolt text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">Prefetch</p>
                <p class="text-[11px] text-stone-400">Pre-carrega links no hover</p>
            </div>
        </div>
    </div>
</div>
