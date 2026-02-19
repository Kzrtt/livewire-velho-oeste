<div class="w-full max-w-4xl mx-auto space-y-8">
    {{-- Title --}}
    <div class="text-center space-y-2">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            O <span class="text-orange-500">Inimigo</span> do JavaScript
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            Por que "inimigo"? E como isso mudou.
        </p>
    </div>

    {{-- Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Card 1 --}}
        <div class="p-6 rounded-xl bg-stone-800/60 border border-stone-700/50 space-y-4 hover:border-orange-500/30 transition-colors">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-orange-500/20 flex items-center justify-center">
                    <i class="fad fa-ban text-orange-500 text-lg"></i>
                </div>
                <h3 class="text-lg font-semibold text-stone-100">Sem React, Sem Vue</h3>
            </div>
            <p class="text-stone-300 text-sm leading-relaxed">
                Experiencia construindo o <span class="text-amber-400 font-medium">WebNews</span>
                sem nenhum framework JavaScript no frontend. Zero dependencias JS complexas,
                tudo resolvido no servidor.
            </p>
            <div class="flex items-center gap-2 text-xs text-stone-500">
                <i class="fad fa-clock text-orange-500/50"></i>
                4 meses sem framework JS
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="p-6 rounded-xl bg-stone-800/60 border border-stone-700/50 space-y-4 hover:border-orange-500/30 transition-colors">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-orange-500/20 flex items-center justify-center">
                    <i class="fad fa-server text-orange-500 text-lg"></i>
                </div>
                <h3 class="text-lg font-semibold text-stone-100">Server-Side Power</h3>
            </div>
            <p class="text-stone-300 text-sm leading-relaxed">
                O Livewire traz <span class="text-amber-400 font-medium">reatividade</span>
                para o PHP. Componentes interativos, estados sincronizados e atualizacoes
                em tempo real &mdash; tudo rodando no backend.
            </p>
            <div class="flex items-center gap-2 text-xs text-stone-500">
                <i class="fad fa-bolt text-orange-500/50"></i>
                Reatividade no PHP
            </div>
        </div>
    </div>

    {{-- Quote --}}
    <div class="text-center">
        <blockquote class="text-base md:text-lg text-stone-400 italic">
            "Como e possivel criar telas reativas no
            <span class="text-orange-400 not-italic font-semibold">PHP</span>?"
        </blockquote>
    </div>

    {{-- PHP API that both consume --}}
    <div class="rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
        <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
            <i class="fad fa-elephant text-orange-400 text-sm"></i>
            <span class="text-xs font-bold text-orange-400">API PHP</span>
            <span class="text-[10px] text-stone-500 ml-auto">O que os dois consomem</span>
        </div>
        <div class="p-4 font-mono text-[11px] leading-relaxed overflow-x-hidden">
            <div><span class="text-stone-500">// routes/api.php</span></div>
            <div><span class="text-amber-300">Route</span>::<span class="text-stone-300">get</span>(<span class="text-green-400">'/posts'</span>, <span class="text-amber-300">function</span> () {</div>
            <div class="pl-4"><span class="text-amber-300">return</span> <span class="text-amber-300">Post</span>::<span class="text-stone-300">select</span>(<span class="text-green-400">'id'</span>, <span class="text-green-400">'title'</span>)</div>
            <div class="pl-8">-><span class="text-stone-300">latest</span>()-><span class="text-stone-300">limit</span>(<span class="text-orange-300">10</span>)-><span class="text-stone-300">get</span>();</div>
            <div>});</div>
            <div class="mt-1"><span class="text-stone-500">// Retorna: [{"id": 1, "title": "Meu Post"}, ...]</span></div>
        </div>
    </div>

    {{-- JS verbosity comparison --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        {{-- Vanilla JS --}}
        <div class="rounded-xl bg-stone-800/60 border border-stone-700/50 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-yellow-500/10 border-b border-yellow-500/20">
                <i class="fad fa-code text-yellow-400 text-sm"></i>
                <span class="text-xs font-bold text-yellow-400">DOM na Unha</span>
                <span class="text-[10px] text-stone-500 ml-auto">JavaScript Puro</span>
            </div>
            <div class="p-4 font-mono text-[11px] leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">// Buscar posts de uma API PHP</span></div>
                <div><span class="text-amber-300">const</span> <span class="text-orange-400">list</span> = <span class="text-stone-300">document</span></div>
                <div class="pl-4">.<span class="text-stone-300">getElementById</span>(<span class="text-green-400">'posts'</span>);</div>
                <div class="mt-2"><span class="text-amber-300">const</span> <span class="text-orange-400">xhr</span> = <span class="text-amber-300">new</span> <span class="text-stone-300">XMLHttpRequest</span>();</div>
                <div><span class="text-orange-400">xhr</span>.<span class="text-stone-300">open</span>(<span class="text-green-400">'GET'</span>, <span class="text-green-400">'/api/posts'</span>);</div>
                <div><span class="text-orange-400">xhr</span>.<span class="text-stone-300">onload</span> = <span class="text-amber-300">function</span>() {</div>
                <div class="pl-4"><span class="text-amber-300">const</span> <span class="text-orange-400">posts</span> = <span class="text-stone-300">JSON</span>.<span class="text-stone-300">parse</span>(</div>
                <div class="pl-8"><span class="text-orange-400">xhr</span>.<span class="text-stone-300">responseText</span></div>
                <div class="pl-4">);</div>
                <div class="pl-4"><span class="text-orange-400">list</span>.<span class="text-stone-300">innerHTML</span> = <span class="text-green-400">''</span>;</div>
                <div class="pl-4"><span class="text-orange-400">posts</span>.<span class="text-stone-300">forEach</span>(<span class="text-amber-300">function</span>(<span class="text-orange-400">p</span>) {</div>
                <div class="pl-8"><span class="text-amber-300">const</span> <span class="text-orange-400">li</span> = <span class="text-stone-300">document</span></div>
                <div class="pl-12">.<span class="text-stone-300">createElement</span>(<span class="text-green-400">'li'</span>);</div>
                <div class="pl-8"><span class="text-orange-400">li</span>.<span class="text-stone-300">textContent</span> = <span class="text-orange-400">p</span>.<span class="text-stone-300">title</span>;</div>
                <div class="pl-8"><span class="text-orange-400">list</span>.<span class="text-stone-300">appendChild</span>(<span class="text-orange-400">li</span>);</div>
                <div class="pl-4">});</div>
                <div>};</div>
                <div><span class="text-orange-400">xhr</span>.<span class="text-stone-300">send</span>();</div>
            </div>
        </div>

        {{-- jQuery --}}
        <div class="rounded-xl bg-stone-800/60 border border-stone-700/50 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-blue-500/10 border-b border-blue-500/20">
                <i class="fad fa-dollar-sign text-blue-400 text-sm"></i>
                <span class="text-xs font-bold text-blue-400">jQuery</span>
                <span class="text-[10px] text-stone-500 ml-auto">Um Pouco Melhor...</span>
            </div>
            <div class="p-4 font-mono text-[11px] leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">// Mesma coisa com jQuery</span></div>
                <div><span class="text-blue-400">$</span>.<span class="text-stone-300">get</span>(<span class="text-green-400">'/api/posts'</span>,</div>
                <div class="pl-2"><span class="text-amber-300">function</span>(<span class="text-orange-400">posts</span>) {</div>
                <div class="pl-4"><span class="text-amber-300">var</span> <span class="text-orange-400">html</span> = <span class="text-green-400">''</span>;</div>
                <div class="pl-4"><span class="text-blue-400">$</span>.<span class="text-stone-300">each</span>(<span class="text-orange-400">posts</span>, <span class="text-amber-300">function</span>(<span class="text-orange-400">i</span>, <span class="text-orange-400">p</span>) {</div>
                <div class="pl-8"><span class="text-orange-400">html</span> += <span class="text-green-400">'&lt;li&gt;'</span></div>
                <div class="pl-10">+ <span class="text-orange-400">p</span>.<span class="text-stone-300">title</span></div>
                <div class="pl-10">+ <span class="text-green-400">'&lt;/li&gt;'</span>;</div>
                <div class="pl-4">});</div>
                <div class="pl-4"><span class="text-blue-400">$</span>(<span class="text-green-400">'#posts'</span>)</div>
                <div class="pl-8">.<span class="text-stone-300">html</span>(<span class="text-orange-400">html</span>);</div>
                <div class="pl-2">}</div>
                <div>);</div>
                <div class="mt-2"><span class="text-stone-500">// Precisa de: script src jquery.min.js</span></div>
                <div><span class="text-stone-500">// + montar HTML manualmente</span></div>
            </div>
        </div>
    </div>
</div>
