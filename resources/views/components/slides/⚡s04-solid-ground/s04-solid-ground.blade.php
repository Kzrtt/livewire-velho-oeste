<div class="w-full max-w-6xl mx-auto space-y-10 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            Laravel, <span class="text-orange-500">Terreno Firme</span> para Correr
        </h2>
        <p class="text-base md:text-lg text-stone-400 max-w-2xl mx-auto">
            O Laravel fornece os pilares que sustentam o Livewire.
            <br class="hidden md:block">
            Sem essa base, nenhuma magica acontece.
        </p>
    </div>

    {{-- 3 pillar cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-up-2">
        {{-- Eloquent --}}
        <div class="p-6 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-orange-500/20 flex items-center justify-center">
                    <i class="fad fa-database text-orange-500 text-lg"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-stone-100">Eloquent</h3>
                    <p class="text-xs text-stone-400">ORM, Models, Relacoes, Auth</p>
                </div>
            </div>

            <p class="text-sm text-stone-300 leading-relaxed">
                Cada Model e uma representacao direta da tabela. Relacoes como
                <span class="text-amber-400 font-mono text-xs">hasMany</span>,
                <span class="text-amber-400 font-mono text-xs">belongsTo</span> e
                <span class="text-amber-400 font-mono text-xs">morphTo</span>
                eliminam SQL manual. A Facade
                <span class="text-amber-400 font-mono text-xs">Auth</span>
                resolve autenticacao com uma linha.
            </p>

            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-4 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">// Busca usuario e seus posts</span></div>
                <div><span class="text-orange-400">$user</span> = <span class="text-amber-300">User</span>::<span class="text-stone-300">find</span>(<span class="text-orange-300">1</span>);</div>
                <div class="mt-2"><span class="text-orange-400">$posts</span> = <span class="text-orange-400">$user</span></div>
                <div class="pl-4">-><span class="text-stone-300">posts</span>()</div>
                <div class="pl-4">-><span class="text-stone-300">where</span>(<span class="text-green-400">'published'</span>, <span class="text-orange-300">true</span>)</div>
                <div class="pl-4">-><span class="text-stone-300">latest</span>()</div>
                <div class="pl-4">-><span class="text-stone-300">get</span>();</div>
                <div class="mt-2"><span class="text-stone-500">// Autenticacao</span></div>
                <div><span class="text-orange-400">$admin</span> = <span class="text-amber-300">Auth</span>::<span class="text-stone-300">user</span>();</div>
            </div>
        </div>

        {{-- Routes --}}
        <div class="p-6 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-orange-500/20 flex items-center justify-center">
                    <i class="fad fa-route text-orange-500 text-lg"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-stone-100">Rotas</h3>
                    <p class="text-xs text-stone-400">web.php, Route Facade, Middlewares</p>
                </div>
            </div>

            <p class="text-sm text-stone-300 leading-relaxed">
                O <span class="text-amber-400 font-mono text-xs">web.php</span>
                centraliza todas as URLs da aplicacao. Middlewares como
                <span class="text-amber-400 font-mono text-xs">auth</span> e
                <span class="text-amber-400 font-mono text-xs">verified</span>
                protegem rotas sem tocar no controller. O Livewire se conecta
                diretamente nesse sistema.
            </p>

            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-4 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">// Rota protegida por middleware</span></div>
                <div><span class="text-amber-300">Route</span>::<span class="text-stone-300">get</span>(</div>
                <div class="pl-4"><span class="text-green-400">'/dashboard'</span>,</div>
                <div class="pl-4"><span class="text-amber-300">Dashboard</span>::<span class="text-stone-300">class</span></div>
                <div>)-><span class="text-stone-300">middleware</span>(</div>
                <div class="pl-4">[<span class="text-green-400">'auth'</span>, <span class="text-green-400">'verified'</span>]</div>
                <div>);</div>
                <div class="mt-2"><span class="text-stone-500">// Livewire como full-page</span></div>
                <div><span class="text-amber-300">Route</span>::<span class="text-stone-300">livewire</span>(</div>
                <div class="pl-4"><span class="text-green-400">'/editor'</span>,</div>
                <div class="pl-4"><span class="text-green-400">'editor'</span></div>
                <div>);</div>
            </div>
        </div>

        {{-- Jobs --}}
        <div class="p-6 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-orange-500/20 flex items-center justify-center">
                    <i class="fad fa-cogs text-orange-500 text-lg"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-stone-100">Jobs</h3>
                    <p class="text-xs text-stone-400">Queue Workers, Scheduler</p>
                </div>
            </div>

            <p class="text-sm text-stone-300 leading-relaxed">
                Tarefas pesadas saem do request e vao para a fila. Redis ou banco
                de dados processam em background. O
                <span class="text-amber-400 font-mono text-xs">Scheduler</span>
                substitui o crontab inteiro com uma unica entrada.
                O Livewire pode disparar jobs direto de uma acao no componente.
            </p>

            <div class="rounded-lg bg-stone-900/80 border border-stone-700/30 p-4 font-mono text-xs leading-relaxed overflow-x-hidden">
                <div><span class="text-stone-500">// Dispara job para fila</span></div>
                <div><span class="text-amber-300">SendNewsletter</span>::<span class="text-stone-300">dispatch</span>(</div>
                <div class="pl-4"><span class="text-orange-400">$edition</span></div>
                <div>)-><span class="text-stone-300">onQueue</span>(<span class="text-green-400">'emails'</span>);</div>
                <div class="mt-2"><span class="text-stone-500">// Scheduler no Console Kernel</span></div>
                <div><span class="text-orange-400">$schedule</span></div>
                <div class="pl-4">-><span class="text-stone-300">job</span>(<span class="text-amber-300">CleanExpired</span>::<span class="text-stone-300">class</span>)</div>
                <div class="pl-4">-><span class="text-stone-300">daily</span>();</div>
            </div>
        </div>
    </div>

    {{-- Footer note --}}
    <div class="text-center fade-up-3">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-stone-800/50 border border-stone-700/30 text-sm text-stone-400">
            <i class="fad fa-shield-check text-orange-500/70"></i>
            O Livewire funciona porque o Laravel resolve o resto
        </div>
    </div>
</div>
