<div class="w-full max-w-6xl mx-auto space-y-8 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            O <span class="text-orange-500">Lado B</span>...
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            Limitacoes honestas do Livewire <span class="text-stone-500">(que o v4 resolve)</span>
        </p>
    </div>

    {{-- Limitation cards - 2 rows of 3 --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 fade-up-2">
        {{-- Card 1: Full re-render --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-red-500/30 hover:border-red-500/50 transition-colors space-y-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 shrink-0 rounded-lg bg-red-500/20 flex items-center justify-center">
                    <i class="fad fa-redo text-red-400 text-lg"></i>
                </div>
                <h3 class="text-sm font-bold text-stone-100">Re-render Completo</h3>
            </div>
            <p class="text-xs text-stone-300 leading-relaxed">
                Cada update re-renderiza o componente inteiro, mesmo que so uma propriedade mude.
                Desperdicio de processamento em templates grandes.
            </p>
            <div class="flex items-center gap-2 text-[10px] text-green-400 font-medium">
                <i class="fad fa-bolt text-green-400"></i>
                v4: Blaze otimiza partes estaticas
            </div>
        </div>

        {{-- Card 2: Two files per component --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-red-500/30 hover:border-red-500/50 transition-colors space-y-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 shrink-0 rounded-lg bg-red-500/20 flex items-center justify-center">
                    <i class="fad fa-copy text-red-400 text-lg"></i>
                </div>
                <h3 class="text-sm font-bold text-stone-100">Dois Arquivos Sempre</h3>
            </div>
            <p class="text-xs text-stone-300 leading-relaxed">
                Todo componente exige classe PHP + template Blade separados.
                Componentes simples geram muito boilerplate e navegacao entre arquivos.
            </p>
            <div class="flex items-center gap-2 text-[10px] text-green-400 font-medium">
                <i class="fad fa-bolt text-green-400"></i>
                v4: Single-File Components (Volt)
            </div>
        </div>

        {{-- Card 3: $wire awkward API --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-amber-500/30 hover:border-amber-500/50 transition-colors space-y-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 shrink-0 rounded-lg bg-amber-500/20 flex items-center justify-center">
                    <i class="fad fa-dollar-sign text-amber-400 text-lg"></i>
                </div>
                <h3 class="text-sm font-bold text-stone-100">API $wire Confusa</h3>
            </div>
            <p class="text-xs text-stone-300 leading-relaxed">
                <span class="text-amber-400 font-mono">$wire</span> no frontend e estranho para quem vem do JS.
                Sintaxe diferente de tudo no ecossistema, curva de aprendizado extra.
            </p>
            <div class="flex items-center gap-2 text-[10px] text-green-400 font-medium">
                <i class="fad fa-bolt text-green-400"></i>
                v4: Nova API com this.
            </div>
        </div>

        {{-- Card 4: Multiple components = slow --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-amber-500/30 hover:border-amber-500/50 transition-colors space-y-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 shrink-0 rounded-lg bg-amber-500/20 flex items-center justify-center">
                    <i class="fad fa-th-large text-amber-400 text-lg"></i>
                </div>
                <h3 class="text-sm font-bold text-stone-100">Tudo ao Mesmo Tempo</h3>
            </div>
            <p class="text-xs text-stone-300 leading-relaxed">
                Muitos componentes na mesma pagina = multiplos ciclos
                <span class="text-amber-400 font-mono text-[10px]">hydrate → render</span>
                no servidor. Paginas pesadas engasgam.
            </p>
            <div class="flex items-center gap-2 text-[10px] text-green-400 font-medium">
                <i class="fad fa-bolt text-green-400"></i>
                v4: Islands isolam blocos caros
            </div>
        </div>

        {{-- Card 5: Micro-interactions --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-orange-500/30 hover:border-orange-500/50 transition-colors space-y-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 shrink-0 rounded-lg bg-orange-500/20 flex items-center justify-center">
                    <i class="fad fa-paint-brush text-orange-400 text-lg"></i>
                </div>
                <h3 class="text-sm font-bold text-stone-100">Microinteracoes</h3>
            </div>
            <p class="text-xs text-stone-300 leading-relaxed">
                Animacoes, drag-and-drop, transicoes complexas &mdash; Alpine.js faz melhor.
                Round-trip ao servidor <span class="text-amber-400 font-medium">adiciona latencia</span>.
            </p>
            <div class="flex items-center gap-2 text-[10px] text-stone-500 font-medium">
                <i class="fad fa-exclamation-triangle text-stone-500"></i>
                Alpine.js continua sendo a resposta
            </div>
        </div>

        {{-- Card 6: Page reload on navigation --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-orange-500/30 hover:border-orange-500/50 transition-colors space-y-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 shrink-0 rounded-lg bg-orange-500/20 flex items-center justify-center">
                    <i class="fad fa-tachometer-alt text-orange-400 text-lg"></i>
                </div>
                <h3 class="text-sm font-bold text-stone-100">Full Page Reload</h3>
            </div>
            <p class="text-xs text-stone-300 leading-relaxed">
                Navegar entre paginas recarregava tudo. Sem experiencia SPA,
                o usuario sentia cada transicao como um "piscar" da tela.
            </p>
            <div class="flex items-center gap-2 text-[10px] text-green-400 font-medium">
                <i class="fad fa-bolt text-green-400"></i>
                v4: SPA-like nativo com wire:navigate
            </div>
        </div>
    </div>

    {{-- Bottom rule --}}
    <div class="text-center fade-up-3">
        <div class="inline-flex items-center gap-3 px-6 py-3 rounded-xl bg-stone-800/50 border border-orange-500/20">
            <i class="fad fa-balance-scale text-orange-500"></i>
            <p class="text-sm text-stone-300">
                Regra pratica: <span class="text-orange-400 font-semibold">Blade + Livewire</span> quando possivel;
                <span class="text-amber-400 font-semibold">JavaScript</span> para UI pesada.
            </p>
        </div>
    </div>
</div>
