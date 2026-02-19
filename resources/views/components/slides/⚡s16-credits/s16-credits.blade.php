<div class="w-full max-w-4xl mx-auto space-y-8 py-4">
    {{-- Title --}}
    <div class="text-center space-y-3 fade-up-1">
        <h2 class="text-3xl md:text-5xl font-bold text-stone-50">
            <i class="fad fa-hat-cowboy text-orange-500"></i>
            Obrigado!
        </h2>
        <p class="text-base md:text-lg text-stone-400">
            Livewire <span class="text-orange-500">Velho Oeste</span>
        </p>
    </div>

    {{-- Speaker card --}}
    <div class="fade-up-2 rounded-xl bg-stone-800/60 border border-orange-500/30 p-5 md:p-6">
        <div class="flex flex-col md:flex-row items-center gap-5">
            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center shrink-0">
                <i class="fad fa-user-cowboy text-stone-900 text-3xl"></i>
            </div>
            <div class="text-center md:text-left space-y-2">
                <p class="text-lg font-bold text-stone-100">Felipe Kurt Pohling</p>
                <p class="text-sm text-stone-400">Criador do <span class="text-orange-400">WebNews</span> &mdash; Dev PHP/Laravel</p>
                <div class="flex items-center justify-center md:justify-start gap-4 mt-2">
                    <a href="#" class="text-stone-400 hover:text-orange-400 transition-colors">
                        <i class="fab fa-github text-lg"></i>
                    </a>
                    <a href="#" class="text-stone-400 hover:text-orange-400 transition-colors">
                        <i class="fab fa-linkedin text-lg"></i>
                    </a>
                    <a href="#" class="text-stone-400 hover:text-orange-400 transition-colors">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-stone-400 hover:text-orange-400 transition-colors">
                        <i class="fad fa-globe text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Credits --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 fade-up-3">
        {{-- References --}}
        <div class="rounded-xl bg-stone-800/60 border border-stone-700/30 p-5 space-y-3">
            <div class="flex items-center gap-2 mb-3">
                <i class="fad fa-book text-orange-400 text-sm"></i>
                <p class="text-sm font-bold text-stone-100">Referencias</p>
            </div>
            <div class="space-y-2.5">
                <div class="flex items-start gap-2">
                    <i class="fad fa-newspaper text-stone-500 text-xs mt-1"></i>
                    <p class="text-[11px] text-stone-400">
                        <span class="text-stone-300">Laravel News</span> &mdash; Everything We Know About Livewire 4
                    </p>
                </div>
                <div class="flex items-start gap-2">
                    <i class="fad fa-code text-stone-500 text-xs mt-1"></i>
                    <p class="text-[11px] text-stone-400">
                        <span class="text-stone-300">DevDojo (Tony Lea)</span> &mdash; Livewire 4: The Future of PHP Components
                    </p>
                </div>
                <div class="flex items-start gap-2">
                    <i class="fad fa-play-circle text-stone-500 text-xs mt-1"></i>
                    <p class="text-[11px] text-stone-400">
                        <span class="text-stone-300">Laracon / YouTube</span> &mdash; Why this new Livewire version changes everything
                    </p>
                </div>
            </div>
        </div>

        {{-- Thanks --}}
        <div class="rounded-xl bg-stone-800/60 border border-stone-700/30 p-5 space-y-3">
            <div class="flex items-center gap-2 mb-3">
                <i class="fad fa-heart text-orange-400 text-sm"></i>
                <p class="text-sm font-bold text-stone-100">Agradecimentos</p>
            </div>
            <div class="space-y-2.5">
                <div class="flex items-start gap-2">
                    <i class="fad fa-elephant text-purple-400 text-xs mt-1"></i>
                    <p class="text-[11px] text-stone-400">
                        <span class="text-stone-300">PHP Velho Oeste</span> &mdash; pela oportunidade e pela comunidade incrivel
                    </p>
                </div>
                <div class="flex items-start gap-2">
                    <i class="fad fa-bolt text-amber-400 text-xs mt-1"></i>
                    <p class="text-[11px] text-stone-400">
                        <span class="text-stone-300">Caleb Porzio</span> &mdash; por criar e evoluir o Livewire
                    </p>
                </div>
                <div class="flex items-start gap-2">
                    <i class="fad fa-users text-orange-400 text-xs mt-1"></i>
                    <p class="text-[11px] text-stone-400">
                        <span class="text-stone-300">Comunidade Laravel BR</span> &mdash; por manter o ecossistema vivo e forte
                    </p>
                </div>
                <div class="flex items-start gap-2">
                    <i class="fad fa-handshake text-green-400 text-xs mt-1"></i>
                    <p class="text-[11px] text-stone-400">
                        <span class="text-stone-300">Voce!</span> &mdash; por estar aqui assistindo ate o final
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom badges --}}
    <div class="fade-up-4 flex flex-col items-center gap-4">
        <div class="flex flex-wrap items-center justify-center gap-3">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-stone-800/60 border border-stone-700/30 text-xs text-stone-400">
                <i class="fab fa-laravel text-red-400"></i> Laravel 12
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-stone-800/60 border border-stone-700/30 text-xs text-stone-400">
                <i class="fad fa-bolt text-orange-400"></i> Livewire 4
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-stone-800/60 border border-stone-700/30 text-xs text-stone-400">
                <i class="fab fa-css3 text-blue-400"></i> Tailwind CSS 4
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-stone-800/60 border border-stone-700/30 text-xs text-stone-400">
                <i class="fad fa-mountain text-green-400"></i> Alpine.js
            </span>
        </div>
        <p class="text-xs text-stone-600">
            Esta apresentacao foi construida inteiramente com a stack acima
            <i class="fad fa-hat-cowboy-side text-orange-500/50 ml-1"></i>
        </p>
    </div>
</div>
