<div class="w-full max-w-5xl mx-auto space-y-6 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            <i class="fad fa-x-ray text-orange-500"></i>
            Raio X <span class="text-orange-500">WebNews</span>
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            Como o Livewire 4 vai curar as dores do projeto
        </p>
    </div>

    {{-- Current pain points mapped to v4 solutions --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 fade-up-2">
        {{-- Pain 1: Dashboards lentas --}}
        <div class="rounded-xl bg-stone-800/60 border border-stone-700/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                <i class="fad fa-heartbeat text-red-400 text-sm"></i>
                <span class="text-xs font-bold text-red-400">Dor: Dashboards sobrecarregadas</span>
            </div>
            <div class="p-4 space-y-2">
                <p class="text-xs text-stone-400">Multiplos componentes carregando ao mesmo tempo. Graficos, tabelas e feeds travam a pagina inteira no primeiro load.</p>
                <div class="flex items-center gap-2 mt-2 pt-2 border-t border-stone-700/30">
                    <i class="fad fa-prescription text-green-400 text-sm"></i>
                    <div>
                        <p class="text-xs font-bold text-green-400">Remedio: @@island</p>
                        <p class="text-[10px] text-stone-400">Isolar componentes pesados com lazy loading. Cada bloco carrega independente.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pain 2: Re-render desnecessario --}}
        <div class="rounded-xl bg-stone-800/60 border border-stone-700/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                <i class="fad fa-heartbeat text-red-400 text-sm"></i>
                <span class="text-xs font-bold text-red-400">Dor: Re-render de paginas grandes</span>
            </div>
            <div class="p-4 space-y-2">
                <p class="text-xs text-stone-400">Templates de edicao com 50+ campos. Alterar um campo re-renderiza o template inteiro no servidor.</p>
                <div class="flex items-center gap-2 mt-2 pt-2 border-t border-stone-700/30">
                    <i class="fad fa-prescription text-green-400 text-sm"></i>
                    <div>
                        <p class="text-xs font-bold text-green-400">Remedio: Blaze</p>
                        <p class="text-[10px] text-stone-400">Render seletivo automatico. So processa as partes dinamicas que mudaram.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pain 3: Muitos arquivos --}}
        <div class="rounded-xl bg-stone-800/60 border border-stone-700/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                <i class="fad fa-heartbeat text-red-400 text-sm"></i>
                <span class="text-xs font-bold text-red-400">Dor: Codebase espalhada</span>
            </div>
            <div class="p-4 space-y-2">
                <p class="text-xs text-stone-400">Classe PHP em um lugar, Blade em outro. Dezenas de componentes = centenas de arquivos em pastas diferentes.</p>
                <div class="flex items-center gap-2 mt-2 pt-2 border-t border-stone-700/30">
                    <i class="fad fa-prescription text-green-400 text-sm"></i>
                    <div>
                        <p class="text-xs font-bold text-green-400">Remedio: MFC / Volt</p>
                        <p class="text-[10px] text-stone-400">Migrar para single-file ou MFC folders. Tudo co-localizado por componente.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pain 4: Navegacao com reload --}}
        <div class="rounded-xl bg-stone-800/60 border border-stone-700/30 overflow-hidden">
            <div class="flex items-center gap-2 px-4 py-2 bg-red-500/10 border-b border-red-500/20">
                <i class="fad fa-heartbeat text-red-400 text-sm"></i>
                <span class="text-xs font-bold text-red-400">Dor: Reload entre paginas</span>
            </div>
            <div class="p-4 space-y-2">
                <p class="text-xs text-stone-400">Cada navegacao na plataforma faz full page reload. Perde estado de filtros, modals e scroll position.</p>
                <div class="flex items-center gap-2 mt-2 pt-2 border-t border-stone-700/30">
                    <i class="fad fa-prescription text-green-400 text-sm"></i>
                    <div>
                        <p class="text-xs font-bold text-green-400">Remedio: SPA-Like</p>
                        <p class="text-[10px] text-stone-400">Navegacao nativa sem reload. Mantem estado entre paginas automaticamente.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Migration plan --}}
    <div class="fade-up-3 rounded-xl bg-stone-800/60 border border-orange-500/30 overflow-hidden">
        <div class="flex items-center gap-2 px-4 py-2 bg-orange-500/10 border-b border-orange-500/20">
            <i class="fad fa-map text-orange-400 text-sm"></i>
            <span class="text-xs font-bold text-orange-400">Plano de Migracao</span>
        </div>
        <div class="p-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="text-center space-y-2">
                    <div class="w-9 h-9 rounded-full bg-orange-500/20 border border-orange-500/40 flex items-center justify-center mx-auto">
                        <span class="text-orange-400 font-bold text-sm">1</span>
                    </div>
                    <p class="text-[11px] font-bold text-stone-100">Mapear Engasgos</p>
                    <p class="text-[10px] text-stone-400">Identificar paginas com lentidao e componentes pesados</p>
                </div>
                <div class="text-center space-y-2">
                    <div class="w-9 h-9 rounded-full bg-orange-500/20 border border-orange-500/40 flex items-center justify-center mx-auto">
                        <span class="text-orange-400 font-bold text-sm">2</span>
                    </div>
                    <p class="text-[11px] font-bold text-stone-100">Aplicar @@islands</p>
                    <p class="text-[10px] text-stone-400">Isolar blocos caros para lazy loading imediato</p>
                </div>
                <div class="text-center space-y-2">
                    <div class="w-9 h-9 rounded-full bg-orange-500/20 border border-orange-500/40 flex items-center justify-center mx-auto">
                        <span class="text-orange-400 font-bold text-sm">3</span>
                    </div>
                    <p class="text-[11px] font-bold text-stone-100">Migrar para MFC</p>
                    <p class="text-[10px] text-stone-400">Reorganizar componentes em pastas co-localizadas</p>
                </div>
                <div class="text-center space-y-2">
                    <div class="w-9 h-9 rounded-full bg-orange-500/20 border border-orange-500/40 flex items-center justify-center mx-auto">
                        <span class="text-orange-400 font-bold text-sm">4</span>
                    </div>
                    <p class="text-[11px] font-bold text-stone-100">Tipagem Forte</p>
                    <p class="text-[10px] text-stone-400">Aproveitar novas features de tipagem do v4</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom note --}}
    <div class="text-center fade-up-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-stone-800/50 border border-stone-700/30 text-sm text-stone-400">
            <i class="fad fa-newspaper text-orange-500/70"></i>
            WebNews: de Livewire 3 para 4 &mdash; sem reescrever, evoluindo
        </div>
    </div>
</div>
