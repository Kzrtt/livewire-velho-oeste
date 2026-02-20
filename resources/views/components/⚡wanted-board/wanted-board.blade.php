<div x-data="{ showCode: false, codeTab: 'blade' }">
    {{-- Header --}}
    <div class="w-full max-w-6xl mx-auto space-y-6">
        <div class="text-center space-y-2">
            <h2 class="text-2xl md:text-4xl font-bold text-stone-50">
                <i class="fad fa-scroll-old text-orange-500 mr-2"></i>
                Quadro de <span class="text-orange-500">Procurados</span>
            </h2>
            <p class="text-sm text-stone-400">
                Caso de uso real demonstrando as diretivas <span class="text-orange-400 font-mono">wire:</span> com Eloquent
            </p>
        </div>

        {{-- Controls bar --}}
        <div class="flex flex-col md:flex-row items-stretch md:items-center gap-3">
            {{-- Search --}}
            <div class="relative flex-1">
                <span class="absolute -top-2.5 left-2 bg-orange-500/20 text-orange-400 text-[10px] font-mono rounded-full px-2 py-0.5 z-10 leading-none">wire:model.live</span>
                <div class="relative">
                    <i class="fad fa-search absolute left-3 top-1/2 -translate-y-1/2 text-stone-500 text-sm"></i>
                    <input
                        wire:model.live.debounce.300ms="search"
                        type="text"
                        placeholder="Buscar fora-da-lei..."
                        class="w-full bg-stone-800/60 border border-stone-700/50 rounded-lg pl-9 pr-4 py-2 text-sm text-stone-100 placeholder-stone-500 focus:border-orange-500/50 focus:outline-none"
                    />
                </div>
            </div>

            {{-- Status filter --}}
            <div class="relative">
                <span class="absolute -top-2.5 left-2 bg-orange-500/20 text-orange-400 text-[10px] font-mono rounded-full px-2 py-0.5 z-10 leading-none">wire:model</span>
                <select
                    wire:model.live="statusFilter"
                    class="bg-stone-800/60 border border-stone-700/50 rounded-lg px-3 py-2 text-sm text-stone-100 focus:border-orange-500/50 focus:outline-none cursor-pointer"
                >
                    <option value="all">Todos</option>
                    <option value="wanted">Procurados</option>
                    <option value="captured">Capturados</option>
                    <option value="escaped">Fugitivos</option>
                </select>
            </div>

            {{-- Sighting counter --}}
            <div class="relative" wire:poll.5s="refreshSightings">
                <span class="absolute -top-2.5 left-2 bg-orange-500/20 text-orange-400 text-[10px] font-mono rounded-full px-2 py-0.5 z-10 leading-none">wire:poll.5s</span>
                <div class="bg-stone-800/60 border border-stone-700/50 rounded-lg px-4 py-2 text-sm flex items-center gap-2">
                    <i class="fad fa-eye text-amber-400"></i>
                    <span class="text-stone-300"><span class="text-amber-400 font-bold">{{ $this->sightingCount }}</span> avistamentos</span>
                </div>
            </div>

            {{-- Code viewer button --}}
            <button
                x-on:click="showCode = true"
                class="bg-stone-800/60 border border-stone-700/50 rounded-lg px-4 py-2 text-sm text-stone-300 hover:text-orange-400 hover:border-orange-500/50 transition-colors flex items-center gap-2 cursor-pointer"
            >
                <i class="fad fa-code"></i>
                <span>Codigo</span>
            </button>
        </div>

        {{-- Outlaw cards grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach($this->outlaws as $outlaw)
                <div
                    wire:key="outlaw-{{ $outlaw->otl_id }}"
                    wire:transition
                    class="relative p-4 rounded-xl bg-stone-800/60 border border-stone-700/50 hover:border-orange-500/30 transition-colors space-y-2"
                >
                    {{-- wire:key badge --}}
                    <span class="absolute -top-2 right-2 bg-orange-500/20 text-orange-400 text-[10px] font-mono rounded-full px-2 py-0.5 leading-none">wire:key</span>

                    {{-- Alias --}}
                    <div class="text-lg font-bold text-orange-400 truncate" title="{{ $outlaw->otl_alias }}">
                        "{{ $outlaw->otl_alias }}"
                    </div>

                    {{-- Name + Gang --}}
                    <div class="text-sm text-stone-300 truncate">
                        {{ $outlaw->otl_name }}
                        @if($outlaw->gang)
                            <span class="text-stone-500">- {{ $outlaw->gang->gng_name }}</span>
                        @endif
                    </div>

                    {{-- Crime --}}
                    <div class="text-xs text-stone-400">
                        <i class="fad fa-gavel text-stone-500 mr-1"></i>{{ $outlaw->otl_crime }}
                    </div>

                    {{-- Danger level --}}
                    <div class="flex items-center gap-1">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fad fa-star text-xs {{ $i <= $outlaw->otl_danger_level ? 'text-red-500' : 'text-stone-700' }}"></i>
                        @endfor
                        <span class="text-[10px] text-stone-500 ml-1">Perigo</span>
                    </div>

                    {{-- Bounty --}}
                    <div class="flex items-center gap-2">
                        <span class="text-amber-400 font-bold">${{ number_format((float) $outlaw->otl_bounty, 2, '.', ',') }}</span>
                        <button
                            wire:click="openEditBounty({{ $outlaw->otl_id }}, '{{ $outlaw->otl_bounty }}', '{{ addslashes($outlaw->otl_alias) }}')"
                            class="text-stone-500 hover:text-orange-400 text-xs cursor-pointer"
                            title="Editar recompensa"
                        >
                            <i class="fad fa-edit"></i>
                        </button>
                    </div>

                    {{-- Status badge --}}
                    <div>
                        @if($outlaw->otl_status === 'wanted')
                            <span class="inline-block px-2 py-0.5 rounded-full bg-red-500/20 text-red-400 text-[10px] font-bold uppercase">Procurado</span>
                        @elseif($outlaw->otl_status === 'captured')
                            <span class="inline-block px-2 py-0.5 rounded-full bg-green-500/20 text-green-400 text-[10px] font-bold uppercase">Capturado</span>
                        @else
                            <span class="inline-block px-2 py-0.5 rounded-full bg-yellow-500/20 text-yellow-400 text-[10px] font-bold uppercase">Fugitivo</span>
                        @endif
                    </div>

                    {{-- Action buttons --}}
                    @if($outlaw->otl_status === 'wanted' || $outlaw->otl_status === 'escaped')
                        <div class="relative pt-1">
                            <span class="bg-orange-500/20 text-orange-400 text-[10px] font-mono rounded-full px-2 py-0.5 leading-none">wire:click + wire:loading</span>
                            <button
                                wire:click="capture({{ $outlaw->otl_id }})"
                                wire:loading.attr="disabled"
                                wire:target="capture({{ $outlaw->otl_id }})"
                                class="w-full mt-1 text-xs px-3 py-1.5 rounded-lg bg-green-500/20 text-green-400 border border-green-500/30 hover:bg-green-500/30 transition-colors cursor-pointer disabled:opacity-50 disabled:cursor-wait"
                            >
                                <span wire:loading.remove wire:target="capture({{ $outlaw->otl_id }})">
                                    <i class="fad fa-handcuffs mr-1"></i>Capturar
                                </span>
                                <span wire:loading wire:target="capture({{ $outlaw->otl_id }})">
                                    <i class="fad fa-spinner-third fa-spin mr-1"></i>Capturando...
                                </span>
                            </button>
                        </div>
                    @elseif($outlaw->otl_status === 'captured')
                        <div class="relative pt-1">
                            <span class="bg-orange-500/20 text-orange-400 text-[10px] font-mono rounded-full px-2 py-0.5 leading-none">TallStackUI Dialog</span>
                            <button
                                wire:click="confirmRelease({{ $outlaw->otl_id }})"
                                wire:loading.attr="disabled"
                                wire:target="confirmRelease({{ $outlaw->otl_id }}), release({{ $outlaw->otl_id }})"
                                class="w-full mt-1 text-xs px-3 py-1.5 rounded-lg bg-red-500/20 text-red-400 border border-red-500/30 hover:bg-red-500/30 transition-colors cursor-pointer disabled:opacity-50 disabled:cursor-wait"
                            >
                                <span wire:loading.remove wire:target="confirmRelease({{ $outlaw->otl_id }}), release({{ $outlaw->otl_id }})">
                                    <i class="fad fa-lock-open mr-1"></i>Soltar
                                </span>
                                <span wire:loading wire:target="confirmRelease({{ $outlaw->otl_id }}), release({{ $outlaw->otl_id }})">
                                    <i class="fad fa-spinner-third fa-spin mr-1"></i>Soltando...
                                </span>
                            </button>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        @if($this->outlaws->isEmpty())
            <div class="text-center py-12 text-stone-500">
                <i class="fad fa-ghost text-4xl mb-3"></i>
                <p>Nenhum fora-da-lei encontrado.</p>
            </div>
        @endif
    </div>

    {{-- Edit Bounty Modal (TallStackUI) --}}
    <x-ts-modal wire="editBountyModal" title="Editar Recompensa" center>
        <div class="space-y-4">
            <p class="text-sm text-stone-400">
                Alterando recompensa de <span class="text-orange-400 font-bold">"{{ $editingOutlawName }}"</span>
            </p>

            <div class="relative">
                <span class="bg-orange-500/20 text-orange-400 text-[10px] font-mono rounded-full px-2 py-0.5 leading-none">wire:dirty</span>
                <div wire:dirty class="text-[10px] text-amber-400 mt-1">
                    <i class="fad fa-pen mr-1"></i>Alterado
                </div>
                <div class="mt-2">
                    <label class="text-xs text-stone-400 mb-1 block">Valor da recompensa ($)</label>
                    <input
                        wire:model="editingBountyValue"
                        wire:dirty.class="border-amber-500!"
                        type="number"
                        step="0.01"
                        class="w-full bg-stone-800/60 border border-stone-700/50 rounded-lg px-4 py-2 text-lg text-amber-400 font-bold focus:border-orange-500/50 focus:outline-none"
                    />
                </div>
            </div>
        </div>

        <x-slot:footer>
            <div class="flex justify-end gap-2">
                <button
                    wire:click="$set('editBountyModal', false)"
                    class="px-4 py-2 text-sm text-stone-400 hover:text-stone-200 transition-colors cursor-pointer"
                >
                    Cancelar
                </button>
                <button
                    wire:click="saveBounty"
                    class="px-4 py-2 text-sm bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-colors cursor-pointer"
                >
                    <i class="fad fa-check mr-1"></i>Salvar
                </button>
            </div>
        </x-slot:footer>
    </x-ts-modal>

    {{-- Code Viewer Modal --}}
    <template x-teleport="body">
        <div
            x-show="showCode"
            x-transition.opacity.duration.200ms
            x-cloak
            class="fixed inset-0 z-[100] bg-stone-900/95 backdrop-blur-sm flex flex-col"
            x-on:keydown.escape.window="showCode = false"
        >
            {{-- Modal header --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-stone-700/50">
                <div class="flex items-center gap-4">
                    <h3 class="text-lg font-bold text-stone-50">
                        <i class="fad fa-code text-orange-500 mr-2"></i>Codigo do Caso de Uso
                    </h3>
                    <div class="flex gap-1">
                        <button
                            x-on:click="codeTab = 'blade'"
                            x-bind:class="codeTab === 'blade' ? 'bg-orange-500/20 text-orange-400 border-orange-500/40' : 'bg-stone-800/60 text-stone-400 border-stone-700/50'"
                            class="px-3 py-1 text-xs font-mono rounded-lg border transition-colors cursor-pointer"
                        >Blade</button>
                        <button
                            x-on:click="codeTab = 'php'"
                            x-bind:class="codeTab === 'php' ? 'bg-orange-500/20 text-orange-400 border-orange-500/40' : 'bg-stone-800/60 text-stone-400 border-stone-700/50'"
                            class="px-3 py-1 text-xs font-mono rounded-lg border transition-colors cursor-pointer"
                        >PHP</button>
                    </div>
                </div>
                <button x-on:click="showCode = false" class="text-stone-400 hover:text-orange-400 transition-colors cursor-pointer">
                    <i class="fad fa-times text-xl"></i>
                </button>
            </div>

            {{-- Code content --}}
            <div class="flex-1 overflow-auto p-6">
                {{-- Blade tab --}}
                <div x-show="codeTab === 'blade'" class="rounded-xl bg-stone-800/60 border border-stone-700/50 p-5 font-mono text-xs leading-relaxed overflow-x-auto">
<pre class="text-stone-300"><span class="text-stone-500">{{-- Header com controles --}}</span>
&lt;<span class="text-amber-300">input</span>
    <span class="text-orange-400">wire:model.live.debounce.300ms</span>=<span class="text-green-400">"search"</span>
    <span class="text-orange-400">placeholder</span>=<span class="text-green-400">"Buscar fora-da-lei..."</span>
/&gt;

&lt;<span class="text-amber-300">select</span> <span class="text-orange-400">wire:model.live</span>=<span class="text-green-400">"statusFilter"</span>&gt;
    &lt;<span class="text-amber-300">option</span> <span class="text-orange-400">value</span>=<span class="text-green-400">"all"</span>&gt;Todos&lt;/<span class="text-amber-300">option</span>&gt;
    &lt;<span class="text-amber-300">option</span> <span class="text-orange-400">value</span>=<span class="text-green-400">"wanted"</span>&gt;Procurados&lt;/<span class="text-amber-300">option</span>&gt;
&lt;/<span class="text-amber-300">select</span>&gt;

<span class="text-stone-500">{{-- Contador com polling --}}</span>
&lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:poll.5s</span>=<span class="text-green-400">"refreshSightings"</span>&gt;
    @{{ $sightingCount }} avistamentos
&lt;/<span class="text-amber-300">div</span>&gt;

<span class="text-stone-500">{{-- Grid de cards --}}</span>
<span class="text-purple-400">@@foreach</span>($this-&gt;outlaws <span class="text-purple-400">as</span> $outlaw)
    &lt;<span class="text-amber-300">div</span>
        <span class="text-orange-400">wire:key</span>=<span class="text-green-400">"outlaw-@{{ $outlaw-&gt;otl_id }}"</span>
        <span class="text-orange-400">wire:transition</span>
    &gt;
        <span class="text-stone-500">{{-- Modal de edicao via TallStackUI --}}</span>
        &lt;<span class="text-amber-300">x-ts-modal</span> <span class="text-orange-400">wire</span>=<span class="text-green-400">"editBountyModal"</span> <span class="text-orange-400">title</span>=<span class="text-green-400">"Editar Recompensa"</span>&gt;
            &lt;<span class="text-amber-300">input</span>
                <span class="text-orange-400">wire:model</span>=<span class="text-green-400">"editingBountyValue"</span>
                <span class="text-orange-400">wire:dirty.class</span>=<span class="text-green-400">"border-amber-500"</span>
            /&gt;
            &lt;<span class="text-amber-300">div</span> <span class="text-orange-400">wire:dirty</span>&gt;Alterado&lt;/<span class="text-amber-300">div</span>&gt;
        &lt;/<span class="text-amber-300">x-ts-modal</span>&gt;

        <span class="text-stone-500">{{-- Botao capturar --}}</span>
        &lt;<span class="text-amber-300">button</span> <span class="text-orange-400">wire:click</span>=<span class="text-green-400">"capture(@{{ $outlaw-&gt;otl_id }})"</span>&gt;
            &lt;<span class="text-amber-300">span</span> <span class="text-orange-400">wire:loading.remove</span>&gt;Capturar&lt;/<span class="text-amber-300">span</span>&gt;
            &lt;<span class="text-amber-300">span</span> <span class="text-orange-400">wire:loading</span>&gt;Capturando...&lt;/<span class="text-amber-300">span</span>&gt;
        &lt;/<span class="text-amber-300">button</span>&gt;

        <span class="text-stone-500">{{-- Botao soltar com TallStackUI Dialog --}}</span>
        &lt;<span class="text-amber-300">button</span>
            <span class="text-orange-400">wire:click</span>=<span class="text-green-400">"confirmRelease(@{{ $outlaw-&gt;otl_id }})"</span>
        &gt;Soltar&lt;/<span class="text-amber-300">button</span>&gt;
    &lt;/<span class="text-amber-300">div</span>&gt;
<span class="text-purple-400">@@endforeach</span></pre>
                </div>

                {{-- PHP tab --}}
                <div x-show="codeTab === 'php'" class="rounded-xl bg-stone-800/60 border border-stone-700/50 p-5 font-mono text-xs leading-relaxed overflow-x-auto">
<pre class="text-stone-300"><span class="text-purple-400">use</span> <span class="text-amber-300">App\Models\Outlaw</span>;
<span class="text-purple-400">use</span> <span class="text-amber-300">Livewire\Attributes\Computed</span>;
<span class="text-purple-400">use</span> <span class="text-amber-300">Livewire\Component</span>;
<span class="text-purple-400">use</span> <span class="text-amber-300">TallStackUi\Traits\Interactions</span>;

<span class="text-purple-400">new class extends</span> <span class="text-amber-300">Component</span>
{
    <span class="text-purple-400">use</span> <span class="text-amber-300">Interactions</span>;

    <span class="text-purple-400">public</span> <span class="text-cyan-400">string</span> <span class="text-orange-400">$search</span> = <span class="text-green-400">''</span>;
    <span class="text-purple-400">public</span> <span class="text-cyan-400">string</span> <span class="text-orange-400">$statusFilter</span> = <span class="text-green-400">'all'</span>;
    <span class="text-purple-400">public</span> <span class="text-cyan-400">bool</span> <span class="text-orange-400">$editBountyModal</span> = <span class="text-cyan-400">false</span>;

    <span class="text-stone-500">// Computed property — re-avalia a cada render</span>
    <span class="text-yellow-400">#[Computed]</span>
    <span class="text-purple-400">public function</span> <span class="text-amber-300">outlaws</span>()
    {
        <span class="text-orange-400">$query</span> = <span class="text-amber-300">Outlaw</span>::<span class="text-amber-300">with</span>(<span class="text-green-400">'gang'</span>);

        <span class="text-purple-400">if</span> (<span class="text-orange-400">$this</span>-&gt;<span class="text-orange-400">search</span> !== <span class="text-green-400">''</span>) {
            <span class="text-orange-400">$query</span>-&gt;<span class="text-amber-300">search</span>(<span class="text-orange-400">$this</span>-&gt;<span class="text-orange-400">search</span>);
        }

        <span class="text-purple-400">return</span> <span class="text-orange-400">$query</span>-&gt;<span class="text-amber-300">orderByDesc</span>(<span class="text-green-400">'otl_bounty'</span>)-&gt;<span class="text-amber-300">limit</span>(<span class="text-cyan-400">12</span>)-&gt;<span class="text-amber-300">get</span>();
    }

    <span class="text-purple-400">public function</span> <span class="text-amber-300">capture</span>(<span class="text-cyan-400">int</span> <span class="text-orange-400">$outlawId</span>): <span class="text-cyan-400">void</span>
    {
        <span class="text-amber-300">usleep</span>(<span class="text-cyan-400">600000</span>);
        <span class="text-amber-300">Outlaw</span>::<span class="text-amber-300">where</span>(<span class="text-green-400">'otl_id'</span>, <span class="text-orange-400">$outlawId</span>)
            -&gt;<span class="text-amber-300">update</span>([<span class="text-green-400">'otl_status'</span> =&gt; <span class="text-green-400">'captured'</span>]);

        <span class="text-orange-400">$this</span>-&gt;<span class="text-amber-300">toast</span>()-&gt;<span class="text-amber-300">success</span>(<span class="text-green-400">'Capturado!'</span>, <span class="text-green-400">'...'</span>)-&gt;<span class="text-amber-300">send</span>();
    }

    <span class="text-purple-400">public function</span> <span class="text-amber-300">confirmRelease</span>(<span class="text-cyan-400">int</span> <span class="text-orange-400">$outlawId</span>): <span class="text-cyan-400">void</span>
    {
        <span class="text-orange-400">$this</span>-&gt;<span class="text-amber-300">dialog</span>()
            -&gt;<span class="text-amber-300">question</span>(<span class="text-green-400">'Soltar?'</span>, <span class="text-green-400">'Tem certeza?'</span>)
            -&gt;<span class="text-amber-300">confirm</span>(<span class="text-green-400">'Sim'</span>, <span class="text-green-400">'release'</span>, <span class="text-orange-400">$outlawId</span>)
            -&gt;<span class="text-amber-300">cancel</span>(<span class="text-green-400">'Cancelar'</span>)
            -&gt;<span class="text-amber-300">send</span>();
    }

    <span class="text-purple-400">public function</span> <span class="text-amber-300">release</span>(<span class="text-cyan-400">int</span> <span class="text-orange-400">$outlawId</span>): <span class="text-cyan-400">void</span>
    {
        <span class="text-amber-300">usleep</span>(<span class="text-cyan-400">600000</span>);
        <span class="text-amber-300">Outlaw</span>::<span class="text-amber-300">where</span>(<span class="text-green-400">'otl_id'</span>, <span class="text-orange-400">$outlawId</span>)
            -&gt;<span class="text-amber-300">update</span>([<span class="text-green-400">'otl_status'</span> =&gt; <span class="text-green-400">'wanted'</span>]);

        <span class="text-orange-400">$this</span>-&gt;<span class="text-amber-300">toast</span>()-&gt;<span class="text-amber-300">warning</span>(<span class="text-green-400">'Solto!'</span>, <span class="text-green-400">'...'</span>)-&gt;<span class="text-amber-300">send</span>();
    }

    <span class="text-purple-400">public function</span> <span class="text-amber-300">openEditBounty</span>(...): <span class="text-cyan-400">void</span>
    {
        <span class="text-orange-400">$this</span>-&gt;<span class="text-orange-400">editBountyModal</span> = <span class="text-cyan-400">true</span>;
    }

    <span class="text-purple-400">public function</span> <span class="text-amber-300">saveBounty</span>(): <span class="text-cyan-400">void</span>
    {
        <span class="text-amber-300">Outlaw</span>::<span class="text-amber-300">where</span>(...)-&gt;<span class="text-amber-300">update</span>([...]);
        <span class="text-orange-400">$this</span>-&gt;<span class="text-orange-400">editBountyModal</span> = <span class="text-cyan-400">false</span>;

        <span class="text-orange-400">$this</span>-&gt;<span class="text-amber-300">toast</span>()-&gt;<span class="text-amber-300">success</span>(<span class="text-green-400">'Atualizado!'</span>, <span class="text-green-400">'...'</span>)-&gt;<span class="text-amber-300">send</span>();
    }
};</pre>
                </div>
            </div>
        </div>
    </template>
</div>
