<div class="w-full max-w-6xl mx-auto space-y-10 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            <span class="text-orange-500">4 Meses</span> de Livewire
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            Todas as diretivas <span class="text-orange-400 font-mono">wire:</span> que fazem a magica acontecer
        </p>
    </div>

    {{-- Directives grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 fade-up-2">

        {{-- wire:model --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-link text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:model</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">Data Binding</span>
            </div>
            <p class="text-sm text-stone-300">Sincroniza input com propriedade PHP. Suporta <span class="text-amber-400 font-mono text-xs">.live</span>, <span class="text-amber-400 font-mono text-xs">.blur</span>, <span class="text-amber-400 font-mono text-xs">.debounce</span> e <span class="text-amber-400 font-mono text-xs">.throttle</span>.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">input</span> <span class="text-orange-400">wire:model.live</span>=<span class="text-green-400">"search"</span> /&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">select</span> <span class="text-orange-400">wire:model</span>=<span class="text-green-400">"category"</span>&gt;...&lt;/<span class="text-amber-300">select</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">textarea</span> <span class="text-orange-400">wire:model.blur</span>=<span class="text-green-400">"bio"</span>&gt;&lt;/<span class="text-amber-300">textarea</span>&gt;</div>
            </div>
        </div>

        {{-- wire:click --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-hand-pointer text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:click</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">Actions</span>
            </div>
            <p class="text-sm text-stone-300">Executa metodo PHP ao clicar. Aceita <span class="text-amber-400 font-mono text-xs">.prevent</span>, <span class="text-amber-400 font-mono text-xs">.stop</span>, <span class="text-amber-400 font-mono text-xs">.self</span>.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">button</span> <span class="text-orange-400">wire:click</span>=<span class="text-green-400">"save"</span>&gt;Salvar&lt;/<span class="text-amber-300">button</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">button</span> <span class="text-orange-400">wire:click</span>=<span class="text-green-400">"delete(5)"</span>&gt;Remover&lt;/<span class="text-amber-300">button</span>&gt;</div>
            </div>
        </div>

        {{-- wire:submit --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-paper-plane text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:submit</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">Forms</span>
            </div>
            <p class="text-sm text-stone-300">Intercepta o submit do formulario e chama metodo no servidor. Sempre usar com <span class="text-amber-400 font-mono text-xs">.prevent</span>.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">form</span> <span class="text-orange-400">wire:submit.prevent</span>=<span class="text-green-400">"register"</span>&gt;</div>
                <div class="pl-4">&lt;<span class="text-amber-300">input</span> <span class="text-orange-400">wire:model</span>=<span class="text-green-400">"name"</span> /&gt;</div>
                <div class="pl-4">&lt;<span class="text-amber-300">button</span> <span class="text-orange-400">type</span>=<span class="text-green-400">"submit"</span>&gt;Enviar&lt;/<span class="text-amber-300">button</span>&gt;</div>
                <div>&lt;/<span class="text-amber-300">form</span>&gt;</div>
            </div>
        </div>

        {{-- wire:loading --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-spinner-third text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:loading</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">UX States</span>
            </div>
            <p class="text-sm text-stone-300">Mostra/esconde elementos durante requisicoes. Modificadores: <span class="text-amber-400 font-mono text-xs">.remove</span>, <span class="text-amber-400 font-mono text-xs">.class</span>, <span class="text-amber-400 font-mono text-xs">.attr</span>, <span class="text-amber-400 font-mono text-xs">.delay</span>.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">span</span> <span class="text-orange-400">wire:loading</span>&gt;Salvando...&lt;/<span class="text-amber-300">span</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">button</span> <span class="text-orange-400">wire:loading.attr</span>=<span class="text-green-400">"disabled"</span>&gt;</div>
                <div class="pl-4">Enviar</div>
                <div>&lt;/<span class="text-amber-300">button</span>&gt;</div>
            </div>
        </div>

        {{-- wire:dirty --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-pen text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:dirty</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">UX States</span>
            </div>
            <p class="text-sm text-stone-300">Indica quando o valor local difere do servidor. Util para mostrar "alteracoes nao salvas".</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">span</span> <span class="text-orange-400">wire:dirty</span>&gt;</div>
                <div class="pl-4"><span class="text-stone-300">Alteracoes nao salvas</span></div>
                <div>&lt;/<span class="text-amber-300">span</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">input</span> <span class="text-orange-400">wire:dirty.class</span>=<span class="text-green-400">"border-yellow-500"</span> /&gt;</div>
            </div>
        </div>

        {{-- wire:offline --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-wifi-slash text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:offline</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">Connectivity</span>
            </div>
            <p class="text-sm text-stone-300">Mostra elementos apenas quando o usuario esta sem conexao com a internet.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:offline</span>&gt;</div>
                <div class="pl-4"><span class="text-stone-300">Voce esta offline!</span></div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">button</span> <span class="text-orange-400">wire:offline.attr</span>=<span class="text-green-400">"disabled"</span>&gt;...&lt;/<span class="text-amber-300">button</span>&gt;</div>
            </div>
        </div>

        {{-- wire:poll --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-sync text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:poll</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">Real-time</span>
            </div>
            <p class="text-sm text-stone-300">Re-renderiza o componente em intervalos. Modificadores: <span class="text-amber-400 font-mono text-xs">.visible</span>, <span class="text-amber-400 font-mono text-xs">.keep-alive</span>, intervalo customizado.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:poll.5s</span>&gt;</div>
                <div class="pl-4"><span class="text-stone-300">Atualizado: @{{ now() }}</span></div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:poll.visible</span>=<span class="text-green-400">"refreshData"</span>&gt;...&lt;/<span class="text-amber-300">div</span>&gt;</div>
            </div>
        </div>

        {{-- wire:init --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-play text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:init</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">Lifecycle</span>
            </div>
            <p class="text-sm text-stone-300">Executa uma acao assim que o componente aparece na pagina. Nao bloqueia a renderizacao inicial.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:init</span>=<span class="text-green-400">"loadPosts"</span>&gt;</div>
                <div class="pl-4"><span class="text-stone-500">{{-- Mostra skeleton enquanto carrega --}}</span></div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
            </div>
        </div>

        {{-- wire:confirm --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-exclamation-triangle text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:confirm</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">UX Safety</span>
            </div>
            <p class="text-sm text-stone-300">Exibe dialogo de confirmacao antes de executar a acao. Evita cliques acidentais.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">button</span></div>
                <div class="pl-4"><span class="text-orange-400">wire:click</span>=<span class="text-green-400">"delete"</span></div>
                <div class="pl-4"><span class="text-orange-400">wire:confirm</span>=<span class="text-green-400">"Tem certeza?"</span></div>
                <div>&gt;Excluir&lt;/<span class="text-amber-300">button</span>&gt;</div>
            </div>
        </div>

        {{-- wire:navigate --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-compass text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:navigate</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">SPA Navigation</span>
            </div>
            <p class="text-sm text-stone-300">Transforma link em navegacao SPA-like. Prefetch com <span class="text-amber-400 font-mono text-xs">.hover</span>. Sem recarregar pagina.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">a</span> <span class="text-orange-400">href</span>=<span class="text-green-400">"/dashboard"</span> <span class="text-orange-400">wire:navigate</span>&gt;</div>
                <div class="pl-4"><span class="text-stone-300">Dashboard</span></div>
                <div>&lt;/<span class="text-amber-300">a</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">a</span> <span class="text-orange-400">href</span>=<span class="text-green-400">"/profile"</span> <span class="text-orange-400">wire:navigate.hover</span>&gt;Perfil&lt;/<span class="text-amber-300">a</span>&gt;</div>
            </div>
        </div>

        {{-- wire:key --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-key text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:key</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">DOM Tracking</span>
            </div>
            <p class="text-sm text-stone-300">Identifica elementos unicos para o Morph do DOM. Essencial em loops <span class="text-amber-400 font-mono text-xs">@@foreach</span>.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">@@foreach ($posts as $post)</span></div>
                <div class="pl-4">&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:key</span>=<span class="text-green-400">"post-@{{ $post-&gt;id }}"</span>&gt;</div>
                <div class="pl-8"><span class="text-stone-300">@{{ $post-&gt;title }}</span></div>
                <div class="pl-4">&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div><span class="text-stone-500">@@endforeach</span></div>
            </div>
        </div>

        {{-- wire:ignore --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-eye-slash text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:ignore</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">DOM Control</span>
            </div>
            <p class="text-sm text-stone-300">Impede o Livewire de atualizar um trecho do DOM. Perfeito para plugins JS (WYSIWYG, charts).</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:ignore</span>&gt;</div>
                <div class="pl-4"><span class="text-stone-500">{{-- Plugin JS externo aqui --}}</span></div>
                <div class="pl-4">&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">id</span>=<span class="text-green-400">"chart"</span>&gt;&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:ignore.self</span>&gt;...&lt;/<span class="text-amber-300">div</span>&gt;</div>
            </div>
        </div>

        {{-- wire:transition --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-magic text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:transition</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">Animation</span>
            </div>
            <p class="text-sm text-stone-300">Aplica transicoes CSS automaticamente quando elementos entram ou saem do DOM.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:transition</span>&gt;</div>
                <div class="pl-4"><span class="text-stone-300">Conteudo animado</span></div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:transition.opacity.duration.500ms</span>&gt;...&lt;/<span class="text-amber-300">div</span>&gt;</div>
            </div>
        </div>

        {{-- wire:stream --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-wave-square text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:stream</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">Streaming</span>
            </div>
            <p class="text-sm text-stone-300">Recebe conteudo em tempo real do servidor. Ideal para respostas longas (ex: AI, logs).</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:stream</span>=<span class="text-green-400">"output"</span>&gt;</div>
                <div class="pl-4"><span class="text-stone-500">{{-- Conteudo chega incrementalmente --}}</span></div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
            </div>
        </div>

        {{-- wire:replace --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-sync-alt text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:replace</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">DOM Control</span>
            </div>
            <p class="text-sm text-stone-300">Substitui o elemento inteiro ao inves de fazer morph. Util quando morph causa problemas.</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:replace</span>&gt;</div>
                <div class="pl-4"><span class="text-stone-300">@{{ $dynamicContent }}</span></div>
                <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
            </div>
        </div>

        {{-- Event listeners (keydown, change, etc) --}}
        <div class="p-5 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fad fa-bolt text-orange-500"></i>
                    <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-sm font-mono font-bold">wire:[event]</span>
                </div>
                <span class="text-[10px] text-stone-500 uppercase tracking-wider">DOM Events</span>
            </div>
            <p class="text-sm text-stone-300">Qualquer evento DOM: <span class="text-amber-400 font-mono text-xs">keydown</span>, <span class="text-amber-400 font-mono text-xs">change</span>, <span class="text-amber-400 font-mono text-xs">mouseenter</span>, <span class="text-amber-400 font-mono text-xs">focus</span>, <span class="text-amber-400 font-mono text-xs">blur</span>, <span class="text-amber-400 font-mono text-xs">input</span>...</p>
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>&lt;<span class="text-amber-300">input</span> <span class="text-orange-400">wire:keydown.enter</span>=<span class="text-green-400">"search"</span> /&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">select</span> <span class="text-orange-400">wire:change</span>=<span class="text-green-400">"filter"</span>&gt;...&lt;/<span class="text-amber-300">select</span>&gt;</div>
                <div class="mt-1">&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:mouseenter</span>=<span class="text-green-400">"highlight"</span>&gt;...&lt;/<span class="text-amber-300">div</span>&gt;</div>
            </div>
        </div>

    </div>
</div>
