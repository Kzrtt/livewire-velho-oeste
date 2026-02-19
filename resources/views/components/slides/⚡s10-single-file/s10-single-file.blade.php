<div class="w-full max-w-5xl mx-auto space-y-6 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            <span class="text-orange-500">Single-File</span> Components
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            Novas formas de organizar seus componentes no Livewire 4
        </p>
    </div>

    {{-- Three patterns comparison --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 fade-up-2">
        {{-- Pattern 1: Multi-file v3 --}}
        <div class="rounded-xl bg-stone-800/60 border border-red-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                <i class="fad fa-copy text-red-400 text-sm"></i>
                <span class="text-xs font-bold text-red-400">Multi-File (v3)</span>
            </div>
            <div class="p-3 space-y-2">
                <p class="text-[10px] text-stone-500 font-mono mb-1">2 arquivos separados</p>
                <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-2.5 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                    <div class="text-stone-500">// app/Livewire/Counter.php</div>
                    <div><span class="text-amber-300">class</span> <span class="text-stone-100">Counter</span> <span class="text-amber-300">extends</span> Component</div>
                    <div>{</div>
                    <div class="pl-3"><span class="text-amber-300">public int</span> <span class="text-orange-400">$count</span> = <span class="text-orange-300">0</span>;</div>
                    <div class="pl-3"><span class="text-amber-300">public function</span> <span class="text-stone-100">increment</span>() { ... }</div>
                    <div class="pl-3"><span class="text-amber-300">public function</span> <span class="text-stone-100">render</span>() {</div>
                    <div class="pl-6"><span class="text-amber-300">return</span> view(<span class="text-green-400">'livewire.counter'</span>);</div>
                    <div class="pl-3">}</div>
                    <div>}</div>
                </div>
                <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-2.5 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                    <div class="text-stone-500">// resources/views/livewire/counter.blade.php</div>
                    <div>&lt;<span class="text-amber-300">div</span>&gt;</div>
                    <div class="pl-3">&lt;<span class="text-amber-300">span</span>&gt;@{{ $count }}&lt;/<span class="text-amber-300">span</span>&gt;</div>
                    <div class="pl-3">&lt;<span class="text-amber-300">button</span> <span class="text-orange-400">wire:click</span>=<span class="text-green-400">"increment"</span>&gt;+&lt;/<span class="text-amber-300">button</span>&gt;</div>
                    <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                </div>
                <div class="text-center">
                    <span class="text-[10px] text-red-400">Classe e View em pastas diferentes</span>
                </div>
            </div>
        </div>

        {{-- Pattern 2: Single-file / Volt --}}
        <div class="rounded-xl bg-stone-800/60 border border-green-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-green-500/10 border-b border-green-500/20">
                <i class="fad fa-file-code text-green-400 text-sm"></i>
                <span class="text-xs font-bold text-green-400">Single-File / Volt</span>
            </div>
            <div class="p-3 space-y-2">
                <p class="text-[10px] text-stone-500 font-mono mb-1">1 arquivo unico</p>
                <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-2.5 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                    <div class="text-stone-500">// resources/views/livewire/counter.blade.php</div>
                    <div><span class="text-stone-500">&lt;?php</span></div>
                    <div><span class="text-amber-300">use</span> Livewire\Volt\Component;</div>
                    <div class="mt-1"><span class="text-amber-300">new class extends</span> Component {</div>
                    <div class="pl-3"><span class="text-amber-300">public int</span> <span class="text-orange-400">$count</span> = <span class="text-orange-300">0</span>;</div>
                    <div class="pl-3"><span class="text-amber-300">public function</span> <span class="text-stone-100">increment</span>() { ... }</div>
                    <div>}; <span class="text-stone-500">?&gt;</span></div>
                    <div class="mt-1 border-t border-stone-700/30 pt-1">&lt;<span class="text-amber-300">div</span>&gt;</div>
                    <div class="pl-3">&lt;<span class="text-amber-300">span</span>&gt;@{{ $count }}&lt;/<span class="text-amber-300">span</span>&gt;</div>
                    <div class="pl-3">&lt;<span class="text-amber-300">button</span> <span class="text-orange-400">wire:click</span>=<span class="text-green-400">"increment"</span>&gt;+&lt;/<span class="text-amber-300">button</span>&gt;</div>
                    <div>&lt;/<span class="text-amber-300">div</span>&gt;</div>
                </div>
                <div class="text-center">
                    <span class="text-[10px] text-green-400">PHP + Blade juntos, sem render()</span>
                </div>
            </div>
        </div>

        {{-- Pattern 3: MFC Folder (new in v4) --}}
        <div class="rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
                <i class="fad fa-folder-open text-orange-400 text-sm"></i>
                <span class="text-xs font-bold text-orange-400">MFC Folder (v4)</span>
            </div>
            <div class="p-3 space-y-2">
                <p class="text-[10px] text-stone-500 font-mono mb-1">1 pasta, 4 arquivos co-localizados</p>
                <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-2.5 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                    <div class="text-stone-500">// Estrutura de pasta</div>
                    <div class="text-amber-300">&#9889;counter/</div>
                    <div class="pl-3"><i class="fad fa-file-code text-blue-400 text-[9px]"></i> <span class="text-stone-100">counter</span><span class="text-orange-400">.php</span></div>
                    <div class="pl-3"><i class="fad fa-file-code text-green-400 text-[9px]"></i> <span class="text-stone-100">counter</span><span class="text-orange-400">.blade.php</span></div>
                    <div class="pl-3"><i class="fad fa-file-code text-amber-400 text-[9px]"></i> <span class="text-stone-100">counter</span><span class="text-orange-400">.js</span></div>
                    <div class="pl-3"><i class="fad fa-file-code text-purple-400 text-[9px]"></i> <span class="text-stone-100">counter</span><span class="text-orange-400">.css</span></div>
                </div>
                <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-2.5 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                    <div class="text-stone-500">// counter.php</div>
                    <div><span class="text-amber-300">new</span> #[Layout(<span class="text-green-400">'layouts.app'</span>)]</div>
                    <div><span class="text-amber-300">class extends</span> Component {</div>
                    <div class="pl-3"><span class="text-amber-300">public int</span> <span class="text-orange-400">$count</span> = <span class="text-orange-300">0</span>;</div>
                    <div class="pl-3"><span class="text-amber-300">public function</span> <span class="text-stone-100">increment</span>() { ... }</div>
                    <div>};</div>
                </div>
                <div class="text-center">
                    <span class="text-[10px] text-orange-400">PHP, Blade, JS e CSS juntos</span>
                </div>
            </div>
        </div>
    </div>

    {{-- MFC Folder detail: this presentation as example --}}
    <div class="fade-up-3 rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
        <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
            <i class="fad fa-hat-cowboy text-orange-400 text-sm"></i>
            <span class="text-xs font-bold text-orange-400">Exemplo real &mdash; esta apresentacao usa MFC!</span>
        </div>
        <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Left: folder structure --}}
            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-3 font-mono text-[10px] leading-relaxed overflow-x-hidden">
                <div class="text-stone-500 mb-1">// resources/views/components/slides/</div>
                <div class="text-amber-300">&#9889;s01-cover/</div>
                <div class="pl-4"><span class="text-stone-100">s01-cover</span><span class="text-orange-400">.php</span> <span class="text-stone-600">&larr; classe + layout</span></div>
                <div class="pl-4"><span class="text-stone-100">s01-cover</span><span class="text-orange-400">.blade.php</span> <span class="text-stone-600">&larr; template</span></div>
                <div class="pl-4"><span class="text-stone-100">s01-cover</span><span class="text-orange-400">.js</span> <span class="text-stone-600">&larr; JS do componente</span></div>
                <div class="pl-4"><span class="text-stone-100">s01-cover</span><span class="text-orange-400">.css</span> <span class="text-stone-600">&larr; CSS escopado</span></div>
                <div class="mt-1 text-amber-300">&#9889;s02-about-me/</div>
                <div class="pl-4 text-stone-600">...</div>
                <div class="mt-1 text-amber-300">&#9889;s10-single-file/</div>
                <div class="pl-4 text-stone-600">... voce esta aqui!</div>
            </div>
            {{-- Right: explanation --}}
            <div class="space-y-3">
                <div class="flex items-start gap-2">
                    <i class="fad fa-file-code text-blue-400 text-sm mt-0.5"></i>
                    <div>
                        <p class="text-xs font-bold text-stone-100">.php</p>
                        <p class="text-[10px] text-stone-400">Classe anonima com propriedades, metodos e atributos de layout</p>
                    </div>
                </div>
                <div class="flex items-start gap-2">
                    <i class="fad fa-file-code text-green-400 text-sm mt-0.5"></i>
                    <div>
                        <p class="text-xs font-bold text-stone-100">.blade.php</p>
                        <p class="text-[10px] text-stone-400">Template Blade &mdash; sem precisar de render(), inferido automaticamente</p>
                    </div>
                </div>
                <div class="flex items-start gap-2">
                    <i class="fad fa-file-code text-amber-400 text-sm mt-0.5"></i>
                    <div>
                        <p class="text-xs font-bold text-stone-100">.js</p>
                        <p class="text-[10px] text-stone-400">JavaScript do componente &mdash; bundled automaticamente pelo Vite</p>
                    </div>
                </div>
                <div class="flex items-start gap-2">
                    <i class="fad fa-file-code text-purple-400 text-sm mt-0.5"></i>
                    <div>
                        <p class="text-xs font-bold text-stone-100">.css</p>
                        <p class="text-[10px] text-stone-400">CSS escopado ao componente &mdash; sem conflitos globais</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Benefits --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 fade-up-4">
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-folder-open text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">Colocalidade Total</p>
                <p class="text-[11px] text-stone-400">PHP, Blade, JS e CSS na mesma pasta</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-magic text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">Sem render()</p>
                <p class="text-[11px] text-stone-400">Template inferido pelo nome do arquivo</p>
            </div>
        </div>
        <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-800/40 border border-stone-700/30">
            <i class="fad fa-terminal text-orange-400 text-lg"></i>
            <div>
                <p class="text-sm font-bold text-stone-100">artisan --mfc</p>
                <p class="text-[11px] text-stone-400">Cria a pasta completa com um comando</p>
            </div>
        </div>
    </div>
</div>
