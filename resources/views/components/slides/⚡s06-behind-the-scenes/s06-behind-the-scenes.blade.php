<div class="w-full max-w-5xl mx-auto space-y-10 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            <span class="text-orange-500">Bastidores:</span> Do wire:* Ate a Requisicao
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            O ciclo completo de uma interacao Livewire
        </p>
    </div>

    {{-- Flow diagram --}}
    <div class="relative fade-up-2">
        {{-- Desktop layout --}}
        <div class="hidden md:block space-y-6">
            {{-- Row 1: Steps 1 -> 2 -> 3 --}}
            <div class="flex items-center justify-center">
                {{-- Step 1 --}}
                <div class="p-5 rounded-2xl bg-stone-800/70 border-2 border-orange-500/40 text-center space-y-3 w-48 shadow-lg shadow-orange-500/5">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-orange-500/30 to-orange-600/10 flex items-center justify-center mx-auto">
                        <i class="fad fa-hand-pointer text-orange-400 text-2xl"></i>
                    </div>
                    <p class="text-sm font-bold text-stone-100">User Action</p>
                    <p class="text-xs text-orange-400 font-mono">wire:click, wire:model</p>
                    <p class="text-[11px] text-stone-400">Snapshot + fila de acoes</p>
                </div>

                {{-- Arrow 1->2 --}}
                <div class="flex flex-col items-center mx-4">
                    <i class="fad fa-long-arrow-right text-orange-500 text-3xl"></i>
                    <span class="text-[10px] text-stone-500 mt-1">Snapshot</span>
                </div>

                {{-- Step 2 --}}
                <div class="p-5 rounded-2xl bg-stone-800/70 border-2 border-amber-500/40 text-center space-y-3 w-48 shadow-lg shadow-amber-500/5">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-500/30 to-amber-600/10 flex items-center justify-center mx-auto">
                        <i class="fad fa-satellite-dish text-amber-400 text-2xl"></i>
                    </div>
                    <p class="text-sm font-bold text-stone-100">AJAX Request</p>
                    <p class="text-xs text-amber-400 font-mono">POST /livewire/update</p>
                    <p class="text-[11px] text-stone-400">JSON com snapshot + acoes</p>
                </div>

                {{-- Arrow 2->3 --}}
                <div class="flex flex-col items-center mx-4">
                    <i class="fad fa-long-arrow-right text-amber-500 text-3xl"></i>
                    <span class="text-[10px] text-stone-500 mt-1">Payload</span>
                </div>

                {{-- Step 3 --}}
                <div class="p-5 rounded-2xl bg-stone-800/70 border-2 border-orange-500/40 text-center space-y-3 w-48 shadow-lg shadow-orange-500/5">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-orange-500/30 to-orange-600/10 flex items-center justify-center mx-auto">
                        <i class="fad fa-server text-orange-400 text-2xl"></i>
                    </div>
                    <p class="text-sm font-bold text-stone-100">Server</p>
                    <p class="text-xs text-orange-400 font-mono">Re-hidratacao</p>
                    <p class="text-[11px] text-stone-400">syncInput, callMethod</p>
                </div>
            </div>

            {{-- Arrow down from step 3 to step 4 --}}
            <div class="flex justify-end pr-[calc(50%-24rem+6rem)]">
                <div class="flex flex-col items-center">
                    <i class="fad fa-long-arrow-down text-orange-500 text-3xl"></i>
                    <span class="text-[10px] text-stone-500 mt-1">Response</span>
                </div>
            </div>

            {{-- Row 2: Steps 5 <- 4 --}}
            <div class="flex items-center justify-center">
                {{-- Step 5 --}}
                <div class="p-5 rounded-2xl bg-stone-800/70 border-2 border-green-500/40 text-center space-y-3 w-48 shadow-lg shadow-green-500/5">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-green-500/30 to-green-600/10 flex items-center justify-center mx-auto">
                        <i class="fad fa-check-circle text-green-400 text-2xl"></i>
                    </div>
                    <p class="text-sm font-bold text-stone-100">UI Updated</p>
                    <p class="text-xs text-green-400 font-mono">Snapshot atualizado</p>
                    <p class="text-[11px] text-stone-400">Pronto para proxima acao</p>
                </div>

                {{-- Arrow 4->5 --}}
                <div class="flex flex-col items-center mx-4">
                    <i class="fad fa-long-arrow-left text-green-500 text-3xl"></i>
                    <span class="text-[10px] text-stone-500 mt-1">Patch</span>
                </div>

                {{-- Step 4 --}}
                <div class="p-5 rounded-2xl bg-stone-800/70 border-2 border-amber-500/40 text-center space-y-3 w-48 shadow-lg shadow-amber-500/5">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-500/30 to-amber-600/10 flex items-center justify-center mx-auto">
                        <i class="fad fa-exchange-alt text-amber-400 text-2xl"></i>
                    </div>
                    <p class="text-sm font-bold text-stone-100">DOM Diff</p>
                    <p class="text-xs text-amber-400 font-mono">Morph na subarvore</p>
                    <p class="text-[11px] text-stone-400">HTML novo + efeitos</p>
                </div>
            </div>
        </div>

        {{-- Mobile layout --}}
        <div class="md:hidden space-y-2">
            {{-- Step 1 --}}
            <div class="p-4 rounded-2xl bg-stone-800/70 border-2 border-orange-500/40 flex items-center gap-4">
                <div class="w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-orange-500/30 to-orange-600/10 flex items-center justify-center">
                    <i class="fad fa-hand-pointer text-orange-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-stone-100">1. User Action</p>
                    <p class="text-xs text-orange-400 font-mono">wire:click, wire:model</p>
                </div>
            </div>

            <div class="flex justify-center py-1">
                <i class="fad fa-long-arrow-down text-orange-500 text-2xl"></i>
            </div>

            {{-- Step 2 --}}
            <div class="p-4 rounded-2xl bg-stone-800/70 border-2 border-amber-500/40 flex items-center gap-4">
                <div class="w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-amber-500/30 to-amber-600/10 flex items-center justify-center">
                    <i class="fad fa-satellite-dish text-amber-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-stone-100">2. AJAX Request</p>
                    <p class="text-xs text-amber-400 font-mono">POST /livewire/update</p>
                </div>
            </div>

            <div class="flex justify-center py-1">
                <i class="fad fa-long-arrow-down text-amber-500 text-2xl"></i>
            </div>

            {{-- Step 3 --}}
            <div class="p-4 rounded-2xl bg-stone-800/70 border-2 border-orange-500/40 flex items-center gap-4">
                <div class="w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-orange-500/30 to-orange-600/10 flex items-center justify-center">
                    <i class="fad fa-server text-orange-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-stone-100">3. Server</p>
                    <p class="text-xs text-orange-400 font-mono">Re-hidratacao, render()</p>
                </div>
            </div>

            <div class="flex justify-center py-1">
                <i class="fad fa-long-arrow-down text-orange-500 text-2xl"></i>
            </div>

            {{-- Step 4 --}}
            <div class="p-4 rounded-2xl bg-stone-800/70 border-2 border-amber-500/40 flex items-center gap-4">
                <div class="w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-amber-500/30 to-amber-600/10 flex items-center justify-center">
                    <i class="fad fa-exchange-alt text-amber-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-stone-100">4. DOM Diff</p>
                    <p class="text-xs text-amber-400 font-mono">Morph na subarvore</p>
                </div>
            </div>

            <div class="flex justify-center py-1">
                <i class="fad fa-long-arrow-down text-green-500 text-2xl"></i>
            </div>

            {{-- Step 5 --}}
            <div class="p-4 rounded-2xl bg-stone-800/70 border-2 border-green-500/40 flex items-center gap-4">
                <div class="w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-green-500/30 to-green-600/10 flex items-center justify-center">
                    <i class="fad fa-check-circle text-green-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-stone-100">5. UI Updated</p>
                    <p class="text-xs text-green-400 font-mono">Snapshot atualizado</p>
                </div>
            </div>
        </div>
    </div>

    {{-- JSON Payload Example --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 fade-up-3">
        {{-- Left: JSON example --}}
        <div class="rounded-xl bg-stone-800/70 border border-amber-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-amber-500/10 border-b border-amber-500/20">
                <i class="fad fa-file-code text-amber-400 text-sm"></i>
                <span class="text-xs font-mono text-amber-400">POST /livewire/update</span>
            </div>
            <div class="p-4 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div>{</div>
                <div class="pl-4"><span class="text-amber-400">"fingerprint"</span>: {</div>
                <div class="pl-8"><span class="text-amber-400">"id"</span>: <span class="text-green-400">"a1b2c3d4"</span>,</div>
                <div class="pl-8"><span class="text-amber-400">"name"</span>: <span class="text-green-400">"counter"</span></div>
                <div class="pl-4">},</div>
                <div class="pl-4"><span class="text-amber-400">"serverMemo"</span>: {</div>
                <div class="pl-8"><span class="text-amber-400">"data"</span>: { <span class="text-amber-400">"count"</span>: <span class="text-orange-300">3</span> },</div>
                <div class="pl-8"><span class="text-amber-400">"htmlHash"</span>: <span class="text-green-400">"f8e2..."</span></div>
                <div class="pl-4">},</div>
                <div class="pl-4"><span class="text-amber-400">"updates"</span>: [{</div>
                <div class="pl-8"><span class="text-amber-400">"type"</span>: <span class="text-green-400">"callMethod"</span>,</div>
                <div class="pl-8"><span class="text-amber-400">"payload"</span>: {</div>
                <div class="pl-12"><span class="text-amber-400">"method"</span>: <span class="text-green-400">"increment"</span></div>
                <div class="pl-8">}</div>
                <div class="pl-4">}]</div>
                <div>}</div>
            </div>
        </div>

        {{-- Right: Key explanations --}}
        <div class="rounded-xl bg-stone-800/70 border border-orange-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
                <i class="fad fa-key text-orange-400 text-sm"></i>
                <span class="text-xs font-bold text-orange-400">Chaves do Payload</span>
            </div>
            <div class="p-4 space-y-3">
                <div class="space-y-1">
                    <p class="text-sm font-mono font-bold text-amber-400">fingerprint</p>
                    <p class="text-xs text-stone-300">Identifica o componente. Contem o <span class="text-amber-400 font-mono">id</span> unico e o <span class="text-amber-400 font-mono">name</span> da classe Livewire.</p>
                </div>
                <div class="w-full h-px bg-stone-700/50"></div>
                <div class="space-y-1">
                    <p class="text-sm font-mono font-bold text-amber-400">serverMemo</p>
                    <p class="text-xs text-stone-300">O <span class="text-orange-400 font-bold">snapshot</span> do estado. Guarda todas as propriedades publicas (<span class="text-amber-400 font-mono">data</span>) e o hash do HTML para detectar mudancas.</p>
                </div>
                <div class="w-full h-px bg-stone-700/50"></div>
                <div class="space-y-1">
                    <p class="text-sm font-mono font-bold text-amber-400">updates</p>
                    <p class="text-xs text-stone-300">Fila de acoes a executar no servidor. Cada item tem um <span class="text-amber-400 font-mono">type</span> (<span class="text-green-400">callMethod</span>, <span class="text-green-400">syncInput</span>) e o <span class="text-amber-400 font-mono">payload</span> com os parametros.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom note --}}
    <div class="text-center fade-up-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-stone-800/50 border border-stone-700/30 text-sm text-stone-400">
            <i class="fad fa-bolt text-orange-500/70"></i>
            Tudo isso acontece sem recarregar a pagina &mdash; em milissegundos
        </div>
    </div>
</div>
