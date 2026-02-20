<div>
    <div class="w-full max-w-6xl mx-auto space-y-5">
        {{-- Header --}}
        <div class="text-center space-y-2">
            <h2 class="text-2xl md:text-4xl font-bold text-stone-50">
                <i class="fad fa-swords text-orange-500 mr-2"></i>
                Duelo de <span class="text-orange-500">APIs</span>
            </h2>
            <p class="text-sm text-stone-400">
                Mesma acao, mesma resposta &mdash; sintaxe <span class="text-red-400 font-mono">$wire</span> vs <span class="text-green-400 font-mono">this.</span>
            </p>
        </div>

        {{-- Entangle demo --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- $wire.entangle side --}}
            <div class="rounded-xl bg-stone-800/60 border border-red-500/30 overflow-hidden">
                <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                    <i class="fad fa-dollar-sign text-red-400 text-sm"></i>
                    <span class="text-xs font-bold text-red-400">Alpine + $wire.entangle()</span>
                </div>
                <div class="p-4" x-data="{ localHighlight: $wire.entangle('highlight') }">
                    <label class="text-xs text-stone-400 mb-1 block">Destaque (entangle via Alpine):</label>
                    <input
                        x-model="localHighlight"
                        type="text"
                        placeholder="Digite algo..."
                        class="w-full bg-stone-900/80 border border-stone-700/50 rounded-lg px-3 py-2 text-sm text-stone-100 placeholder-stone-500 focus:border-red-500/50 focus:outline-none"
                    />
                    <div class="mt-2 font-mono text-[10px] text-stone-500 bg-stone-900/60 rounded p-2">
                        <div><span class="text-purple-400">x-data</span>=<span class="text-green-400">"{ local: <span class="text-red-400">$wire</span>.entangle('highlight') }"</span></div>
                        <div>&lt;input <span class="text-purple-400">x-model</span>=<span class="text-green-400">"local"</span> /&gt;</div>
                    </div>
                </div>
            </div>

            {{-- wire:model side (the "new" way — simpler, no Alpine boilerplate) --}}
            <div class="rounded-xl bg-stone-800/60 border border-green-500/30 overflow-hidden">
                <div class="flex items-center gap-2 px-4 py-2 bg-green-500/10 border-b border-green-500/20">
                    <i class="fad fa-terminal text-green-400 text-sm"></i>
                    <span class="text-xs font-bold text-green-400">wire:model direto (sem Alpine)</span>
                </div>
                <div class="p-4">
                    <label class="text-xs text-stone-400 mb-1 block">Destaque (Livewire nativo):</label>
                    <input
                        wire:model.live="highlight"
                        type="text"
                        placeholder="Digite algo..."
                        class="w-full bg-stone-900/80 border border-stone-700/50 rounded-lg px-3 py-2 text-sm text-stone-100 placeholder-stone-500 focus:border-green-500/50 focus:outline-none"
                    />
                    <div class="mt-2 font-mono text-[10px] text-stone-500 bg-stone-900/60 rounded p-2">
                        <div>&lt;input <span class="text-orange-400">wire:model.live</span>=<span class="text-green-400">"highlight"</span> /&gt;</div>
                        <div class="text-green-400 text-[9px] mt-1">// Zero Alpine, zero entangle</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sync indicator --}}
        <div class="flex items-center justify-center gap-2 text-xs text-stone-500">
            <i class="fad fa-exchange-alt text-orange-400"></i>
            <span>Ambos sincronizam a mesma propriedade PHP <span class="text-orange-400 font-mono">$highlight</span> = "<span class="text-stone-300">{{ $highlight ?: '...' }}</span>"</span>
        </div>

        {{-- Voting section: side by side --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- $wire side --}}
            <div class="rounded-xl bg-stone-800/60 border border-red-500/30 overflow-hidden">
                <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                    <i class="fad fa-dollar-sign text-red-400 text-sm"></i>
                    <span class="text-xs font-bold text-red-400">Votacao via Alpine @click="$wire."</span>
                </div>
                <div class="p-4 space-y-3">
                    @foreach($this->outlaws as $outlaw)
                        <div class="flex items-center gap-3 p-2 rounded-lg bg-stone-900/50 border border-stone-700/30">
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-bold text-orange-400 truncate">"{{ $outlaw->otl_alias }}"</div>
                                <div class="text-[10px] text-stone-500 truncate">{{ $outlaw->otl_name }}</div>
                            </div>
                            <div class="text-center shrink-0">
                                <div class="text-lg font-black text-amber-400">{{ $votes[$outlaw->otl_id] ?? 0 }}</div>
                                <div class="text-[9px] text-stone-600">votos</div>
                            </div>
                            <button
                                x-on:click="$wire.vote({{ $outlaw->otl_id }})"
                                class="shrink-0 px-3 py-1.5 text-xs rounded-lg bg-red-500/20 text-red-400 border border-red-500/30 hover:bg-red-500/30 transition-colors cursor-pointer"
                            >
                                <i class="fad fa-thumbs-up mr-1"></i>Votar
                            </button>
                        </div>
                    @endforeach

                    {{-- Code snippet --}}
                    <div class="font-mono text-[10px] text-stone-500 bg-stone-900/60 rounded p-2 space-y-0.5">
                        <div><span class="text-stone-600">// Alpine inline — funciona em @click</span></div>
                        <div><span class="text-red-400">$wire</span>.<span class="text-stone-300">vote</span>(<span class="text-cyan-400">id</span>)</div>
                        <div><span class="text-red-400">$wire</span>.<span class="text-stone-300">votes</span></div>
                        <div><span class="text-red-400">$wire</span>.<span class="text-stone-300">resetVotes</span>()</div>
                    </div>
                </div>
            </div>

            {{-- wire:click side (Livewire native — cleaner) --}}
            <div class="rounded-xl bg-stone-800/60 border border-green-500/30 overflow-hidden">
                <div class="flex items-center gap-2 px-4 py-2 bg-green-500/10 border-b border-green-500/20">
                    <i class="fad fa-terminal text-green-400 text-sm"></i>
                    <span class="text-xs font-bold text-green-400">Votacao via wire:click + this.</span>
                </div>
                <div class="p-4 space-y-3">
                    @foreach($this->outlaws as $outlaw)
                        <div class="flex items-center gap-3 p-2 rounded-lg bg-stone-900/50 border border-stone-700/30">
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-bold text-orange-400 truncate">"{{ $outlaw->otl_alias }}"</div>
                                <div class="text-[10px] text-stone-500 truncate">{{ $outlaw->otl_name }}</div>
                            </div>
                            <div class="text-center shrink-0">
                                <div class="text-lg font-black text-amber-400">{{ $votes[$outlaw->otl_id] ?? 0 }}</div>
                                <div class="text-[9px] text-stone-600">votos</div>
                            </div>
                            <button
                                wire:click="vote({{ $outlaw->otl_id }})"
                                class="shrink-0 px-3 py-1.5 text-xs rounded-lg bg-green-500/20 text-green-400 border border-green-500/30 hover:bg-green-500/30 transition-colors cursor-pointer"
                            >
                                <i class="fad fa-thumbs-up mr-1"></i>Votar
                            </button>
                        </div>
                    @endforeach

                    {{-- Code snippet --}}
                    <div class="font-mono text-[10px] text-stone-500 bg-stone-900/60 rounded p-2 space-y-0.5">
                        <div><span class="text-stone-600">// wire:click — auto-resolve para $wire</span></div>
                        <div><span class="text-orange-400">wire:click</span>=<span class="text-green-400">"vote(id)"</span></div>
                        <div class="mt-1"><span class="text-stone-600">// Em &lt;script&gt; — this === $wire</span></div>
                        <div><span class="text-green-400">this</span>.<span class="text-stone-300">vote</span>(<span class="text-cyan-400">id</span>)</div>
                        <div><span class="text-green-400">this</span>.<span class="text-stone-300">votes</span></div>
                        <div><span class="text-green-400">this</span>.<span class="text-stone-300">resetVotes</span>()</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom controls --}}
        <div class="flex flex-col md:flex-row items-center justify-center gap-3">
            <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-orange-500/10 border border-orange-500/30">
                <i class="fad fa-info-circle text-orange-400 text-sm"></i>
                <span class="text-xs text-orange-400">Ambos chamam o <span class="font-bold">mesmo metodo PHP</span> &mdash; <span class="font-mono">this.</span> funciona dentro de <span class="font-mono">&lt;script&gt;</span></span>
            </div>
            <button
                wire:click="resetVotes"
                class="flex items-center gap-2 px-4 py-2 rounded-full bg-stone-800/60 border border-stone-700/50 text-xs text-stone-300 hover:text-orange-400 hover:border-orange-500/50 transition-colors cursor-pointer"
            >
                <i class="fad fa-undo"></i>
                <span>Resetar Votos</span>
            </button>
        </div>

        {{-- Script context demo --}}
        <div class="rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
                <i class="fad fa-code text-orange-400 text-sm"></i>
                <span class="text-xs font-bold text-orange-400">Onde o this. funciona: &lt;script&gt; no componente</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0 divide-y md:divide-y-0 md:divide-x divide-stone-700/30">
                {{-- Before --}}
                <div class="p-4 font-mono text-[10px] leading-relaxed">
                    <div class="text-red-400 text-[9px] font-bold mb-2 font-sans">ANTES (Livewire 3)</div>
                    <div><span class="text-stone-500">// @script no blade</span></div>
                    <div><span class="text-red-400">$wire</span>.<span class="text-stone-300">on</span>(<span class="text-green-400">'saved'</span>, () =&gt; {</div>
                    <div class="pl-4"><span class="text-stone-300">alert</span>(<span class="text-red-400">$wire</span>.<span class="text-stone-300">lastVotedAlias</span>)</div>
                    <div>})</div>
                    <div class="mt-1"><span class="text-red-400">$wire</span>.<span class="text-stone-300">vote</span>(<span class="text-cyan-400">1</span>)</div>
                    <div><span class="text-red-400">$wire</span>.<span class="text-stone-300">$refresh</span>()</div>
                </div>
                {{-- After --}}
                <div class="p-4 font-mono text-[10px] leading-relaxed">
                    <div class="text-green-400 text-[9px] font-bold mb-2 font-sans">DEPOIS (Livewire 4)</div>
                    <div><span class="text-stone-500">// &lt;script&gt; nativo no blade</span></div>
                    <div><span class="text-green-400">this</span>.<span class="text-stone-300">on</span>(<span class="text-green-400">'saved'</span>, () =&gt; {</div>
                    <div class="pl-4"><span class="text-stone-300">alert</span>(<span class="text-green-400">this</span>.<span class="text-stone-300">lastVotedAlias</span>)</div>
                    <div>})</div>
                    <div class="mt-1"><span class="text-green-400">this</span>.<span class="text-stone-300">vote</span>(<span class="text-cyan-400">1</span>)</div>
                    <div><span class="text-green-400">this</span>.<span class="text-stone-300">$refresh</span>()</div>
                </div>
            </div>
        </div>
    </div>
</div>
