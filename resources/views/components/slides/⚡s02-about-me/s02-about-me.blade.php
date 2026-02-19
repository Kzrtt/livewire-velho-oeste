<div class="w-full max-w-6xl mx-auto space-y-8">
    {{-- Title --}}
    <div class="text-center fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            Quem Sou Eu<span class="text-orange-500">?</span>
        </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-8 md:gap-12 items-center">
        {{-- Photo --}}
        <div class="md:col-span-2 flex flex-col items-center space-y-5 fade-up-2">
            <div class="relative">
                <div class="w-48 h-48 md:w-64 md:h-64 rounded-2xl overflow-hidden border-4 border-orange-500/40 shadow-2xl shadow-orange-500/10 rotate-2 hover:rotate-0 transition-transform duration-300">
                    <img
                        src="{{ asset('images/kurt-velho-oeste.jpg') }}"
                        alt="Felipe Kurt Pohling no PHP Velho Oeste"
                        class="w-full h-full object-cover"
                    />
                </div>
                <div class="absolute -bottom-3 -right-3 px-3 py-1 rounded-lg bg-orange-500 text-stone-900 text-xs font-bold shadow-lg">
                    <i class="fad fa-hat-cowboy"></i> PHP Velho Oeste
                </div>
            </div>

            <div class="text-center space-y-1">
                <h3 class="text-2xl md:text-3xl font-bold text-stone-50">Felipe Kurt Pohling</h3>
                <p class="text-base text-amber-400 font-medium">@kurtt.kk</p>
            </div>
        </div>

        {{-- Info and links --}}
        <div class="md:col-span-3 space-y-5 fade-up-3">
            {{-- Info cards --}}
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-stone-800/50 border border-stone-700/50 hover:border-orange-500/30 transition-colors">
                    <div class="w-11 h-11 shrink-0 rounded-lg bg-orange-500/20 flex items-center justify-center">
                        <i class="fad fa-graduation-cap text-orange-500 text-lg"></i>
                    </div>
                    <div>
                        <p class="text-stone-100 font-semibold text-base">7&ordm; Periodo - Sistemas de Informacao</p>
                        <p class="text-sm text-stone-400 mt-1">Formacao academica em andamento</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-xl bg-stone-800/50 border border-stone-700/50 hover:border-orange-500/30 transition-colors">
                    <div class="w-11 h-11 shrink-0 rounded-lg bg-orange-500/20 flex items-center justify-center">
                        <i class="fad fa-code text-orange-500 text-lg"></i>
                    </div>
                    <div>
                        <p class="text-stone-100 font-semibold text-base">Desenvolvedor Pleno PHP</p>
                        <p class="text-sm text-stone-400 mt-1">CodeIgniter, Laravel, PHP Vanilla + jQuery</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-xl bg-stone-800/50 border border-stone-700/50 hover:border-orange-500/30 transition-colors">
                    <div class="w-11 h-11 shrink-0 rounded-lg bg-orange-500/20 flex items-center justify-center">
                        <i class="fad fa-newspaper text-orange-500 text-lg"></i>
                    </div>
                    <div>
                        <p class="text-stone-100 font-semibold text-base">Criador do WebNews</p>
                        <p class="text-sm text-stone-400 mt-1">Newsletter sobre dev e tecnologia, construida com Livewire</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 rounded-xl bg-stone-800/50 border border-stone-700/50 hover:border-orange-500/30 transition-colors">
                    <div class="w-11 h-11 shrink-0 rounded-lg bg-orange-500/20 flex items-center justify-center">
                        <i class="fad fa-elephant text-orange-500 text-lg"></i>
                    </div>
                    <div>
                        <p class="text-stone-100 font-semibold text-base">PHP Enthusiast</p>
                        <p class="text-sm text-stone-400 mt-1">De inimigo do JS a cumplice do Livewire</p>
                    </div>
                </div>
            </div>

            {{-- Social links --}}
            <div class="flex flex-wrap items-center gap-3 pt-2">
                <a
                    href="https://github.com/Kzrtt"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-stone-800/80 border border-stone-700/50 text-stone-200 text-sm font-medium hover:border-orange-500/40 hover:text-orange-400 transition-colors"
                >
                    <i class="fad fa-code-branch text-orange-400"></i>
                    github.com/Kzrtt
                </a>
                <a
                    href="https://webnews.dev.br"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-stone-800/80 border border-stone-700/50 text-stone-200 text-sm font-medium hover:border-orange-500/40 hover:text-orange-400 transition-colors"
                >
                    <i class="fad fa-globe text-orange-400"></i>
                    webnews.dev.br
                </a>
            </div>
        </div>
    </div>
</div>
