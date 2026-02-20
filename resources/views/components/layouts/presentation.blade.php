<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire Velho Oeste</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link
        rel="stylesheet"
        href="{{ asset('css/font-awesome-pro-master.min.css') }}?v=0.0.1"
    >

    <tallstackui:script />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-900 text-stone-50 antialiased overflow-x-hidden" style="font-family: 'Inter', sans-serif;">
    @php
        $slides = config('slides');
        $totalSlides = count($slides);
        $currentSlide = $currentSlide ?? 1;
        $background = $slides[$currentSlide]['background'] ?? 'horizonte-do-deserto';
        $prevSlide = $currentSlide > 1 ? $currentSlide - 1 : null;
        $nextSlide = $currentSlide < $totalSlides ? $currentSlide + 1 : null;
    @endphp

    <div
        x-data="{
            currentSlide: {{ $currentSlide }},
            totalSlides: {{ $totalSlides }},
            prevSlide: {{ $prevSlide ? $prevSlide : 'null' }},
            nextSlide: {{ $nextSlide ? $nextSlide : 'null' }},
            touchStartX: 0,
            touchEndX: 0,
            navigationEnabled: true,
            navigating: false,
            navigate(direction) {
                if (!this.navigationEnabled || this.navigating) return;
                let target = null;
                if (direction === 'prev' && this.prevSlide) target = this.prevSlide;
                else if (direction === 'next' && this.nextSlide) target = this.nextSlide;
                if (!target) return;

                this.navigating = true;
                this.$refs.wrapper.style.transition = 'opacity 0.25s ease-out';
                this.$refs.wrapper.style.opacity = '0';
                setTimeout(() => {
                    window.location.href = '/slide/' + target;
                }, 250);
            },
            handleTouchStart(e) {
                this.touchStartX = e.changedTouches[0].screenX;
            },
            handleTouchEnd(e) {
                if (!this.navigationEnabled) return;
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (Math.abs(diff) > 50) {
                    if (diff > 0) this.navigate('next');
                    else this.navigate('prev');
                }
            }
        }"
        x-on:slide-navigation.window="navigationEnabled = $event.detail.enabled"
        x-on:keydown.arrow-left.window="navigate('prev')"
        x-on:keydown.arrow-right.window="navigate('next')"
        x-on:keydown.a.window="navigate('prev')"
        x-on:keydown.d.window="navigate('next')"
        x-on:touchstart.window="handleTouchStart($event)"
        x-on:touchend.window="handleTouchEnd($event)"
        x-ref="wrapper"
        class="relative h-screen w-screen overflow-x-hidden overflow-y-hidden select-none slide-enter"
    >
        {{-- Dynamic background --}}
        <x-dynamic-component :component="'backgrounds.' . $background" />

        {{-- Slide content --}}
        <div class="relative z-10 h-full w-full flex flex-col overflow-x-hidden">
            <div class="flex-1 overflow-y-auto overflow-x-hidden p-6 md:p-12 flex justify-center custom-scrollbar">
                <div class="w-full max-w-full my-auto">
                    {{ $slot }}
                </div>
            </div>

            {{-- Footer: progress bar + counter --}}
            <div class="relative z-20 shrink-0 px-6 pb-4 pt-2">
                <div class="flex items-center justify-between text-xs text-stone-400 mb-2">
                    <span>Livewire Velho Oeste</span>
                    <span>{{ $currentSlide }} / {{ $totalSlides }}</span>
                </div>
                <div class="w-full h-1 bg-stone-700/50 rounded-full overflow-hidden">
                    <div
                        class="h-full bg-gradient-to-r from-orange-500 to-amber-500 rounded-full transition-all duration-300"
                        style="width: {{ ($currentSlide / $totalSlides) * 100 }}%"
                    ></div>
                </div>
            </div>
        </div>

        {{-- Previous button --}}
        @if($prevSlide)
            <button
                x-on:click="navigate('prev')"
                class="absolute left-2 top-1/2 -translate-y-1/2 z-20 p-3 rounded-full bg-stone-800/50 text-stone-400 hover:text-orange-400 hover:bg-stone-800/80 transition-all opacity-100 md:opacity-0 md:hover:opacity-100 cursor-pointer"
                aria-label="Slide anterior"
            >
                <i class="fad fa-chevron-left text-lg"></i>
            </button>
        @endif

        {{-- Next button --}}
        @if($nextSlide)
            <button
                x-on:click="navigate('next')"
                class="absolute right-2 top-1/2 -translate-y-1/2 z-20 p-3 rounded-full bg-stone-800/50 text-stone-400 hover:text-orange-400 hover:bg-stone-800/80 transition-all opacity-100 md:opacity-0 md:hover:opacity-100 cursor-pointer"
                aria-label="Proximo slide"
            >
                <i class="fad fa-chevron-right text-lg"></i>
            </button>
        @endif
    </div>

    <x-ts-dialog />
    <x-ts-toast />

    @livewireScripts
</body>
</html>
