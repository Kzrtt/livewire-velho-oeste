<div class="absolute inset-0 overflow-hidden bg-stone-900">
    {{-- Overlay gradiente --}}
    <div class="absolute inset-0 bg-gradient-to-br from-stone-900 via-stone-800/30 to-stone-900"></div>

    {{-- Linhas de circuito horizontais --}}
    <div class="absolute top-[20%] left-0 w-[35%] h-px bg-gradient-to-r from-transparent to-orange-500/30"></div>
    <div class="absolute top-[20%] left-[35%] w-px h-[25%] bg-orange-500/30"></div>
    <div class="absolute top-[45%] left-[35%] w-[30%] h-px bg-orange-500/25"></div>
    <div class="absolute top-[45%] right-[35%] w-px h-[20%] bg-orange-500/25"></div>
    <div class="absolute top-[65%] right-[35%] w-[35%] h-px bg-gradient-to-r from-orange-500/25 to-transparent"></div>

    {{-- Linhas de circuito secundarias --}}
    <div class="absolute top-[35%] right-0 w-[25%] h-px bg-gradient-to-l from-transparent to-orange-400/20"></div>
    <div class="absolute top-[35%] right-[25%] w-px h-[30%] bg-orange-400/20"></div>
    <div class="absolute top-[75%] left-[20%] w-[40%] h-px bg-orange-400/15"></div>

    {{-- Linhas verticais --}}
    <div class="absolute top-0 left-[50%] w-px h-[20%] bg-gradient-to-b from-transparent to-orange-500/20"></div>
    <div class="absolute bottom-0 left-[70%] w-px h-[30%] bg-gradient-to-t from-transparent to-orange-400/15"></div>

    {{-- Nos brilhantes (pontos de conexao) --}}
    <div class="absolute top-[20%] left-[35%] w-2.5 h-2.5 rounded-full bg-orange-500 opacity-60 shadow-[0_0_8px_rgba(249,115,22,0.4)]"></div>
    <div class="absolute top-[45%] left-[35%] w-2 h-2 rounded-full bg-orange-500 opacity-50 shadow-[0_0_6px_rgba(249,115,22,0.3)]"></div>
    <div class="absolute top-[45%] right-[35%] w-2.5 h-2.5 rounded-full bg-orange-500 opacity-60 shadow-[0_0_8px_rgba(249,115,22,0.4)]"></div>
    <div class="absolute top-[65%] right-[35%] w-2 h-2 rounded-full bg-orange-400 opacity-50 shadow-[0_0_6px_rgba(251,146,60,0.3)]"></div>
    <div class="absolute top-[35%] right-[25%] w-2 h-2 rounded-full bg-orange-400 opacity-40 shadow-[0_0_6px_rgba(251,146,60,0.3)]"></div>
    <div class="absolute top-[75%] left-[20%] w-2 h-2 rounded-full bg-orange-500 opacity-40 shadow-[0_0_6px_rgba(249,115,22,0.3)]"></div>

    {{-- No central grande --}}
    <div class="absolute top-[20%] left-[35%]">
        <div class="w-2.5 h-2.5 rounded-full bg-orange-500 opacity-60 animate-pulse"></div>
    </div>

    {{-- Elementos organicos (cacto estilizado como circuito) --}}
    <div class="absolute bottom-[15%] left-[8%] opacity-10">
        <div class="w-1 h-20 bg-orange-600 mx-auto"></div>
        <div class="absolute top-4 left-[-8px] w-4 h-1 bg-orange-600"></div>
        <div class="absolute top-4 left-[-8px] w-1 h-8 bg-orange-600"></div>
        <div class="absolute top-8 right-[-8px] w-4 h-1 bg-orange-600"></div>
        <div class="absolute top-8 right-[-8px] w-1 h-6 bg-orange-600"></div>
    </div>

    {{-- Pulso animado nos circuitos --}}
    <div class="absolute top-[45%] left-[35%] w-[30%] h-px overflow-hidden">
        <div class="w-8 h-full bg-gradient-to-r from-transparent via-orange-400/60 to-transparent animate-pulse"></div>
    </div>
</div>
