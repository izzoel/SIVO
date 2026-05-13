<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Depository Lab - {{ config('app.name', 'SIVO') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any" />
    <link rel="icon" href="/favicon.svg" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />

    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite (['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-zinc-950 font-sans text-white antialiased">
    <main class="relative min-h-screen overflow-hidden">
        <img src="{{ asset('depositori.png') }}" alt="Depository Lab" class="absolute inset-0 h-full w-full object-cover" />

        <div class="absolute inset-0 bg-zinc-950/70"></div>
        <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-zinc-950 to-transparent"></div>

        <header class="relative z-10 mx-auto flex w-full max-w-7xl items-center justify-between px-6 py-6 lg:px-8">
            <a href="{{ route('landing') }}" class="flex items-center gap-3 font-semibold tracking-normal">
                <span class="flex size-10 items-center justify-center rounded-lg bg-lime-400 text-zinc-950">
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 8h12" />
                        <path d="M8 8v10" />
                        <path d="M16 8v10" />
                        <path d="M5 18h14" />
                        <path d="M9 4h6l1 4H8l1-4Z" />
                    </svg>
                </span>
                <span>Depository Lab</span>
            </a>

            <nav class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-lg bg-white px-4 py-2 text-sm font-semibold text-zinc-950 transition hover:bg-lime-100"> Dashboard </a>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg border border-white/20 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/10"> Masuk </a>
                @endauth
            </nav>
        </header>

        <section class="relative z-10 mx-auto flex min-h-[calc(100vh-5.5rem)] w-full max-w-7xl items-end px-6 pb-10 pt-16 lg:px-8">
            <div class="grid w-full gap-8 lg:grid-cols-[minmax(0,1fr)_24rem] lg:items-end">
                <div class="max-w-3xl pb-6">
                    <p class="mb-4 inline-flex rounded-full border border-lime-300/30 bg-lime-300/10 px-3 py-1 text-sm font-medium text-lime-100">Sistem informasi inventaris dan laporan laboratorium</p>

                    <h1 class="max-w-3xl text-5xl font-bold tracking-normal text-white sm:text-6xl lg:text-7xl">Depository Lab</h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-zinc-200">Pantau persediaan alat, bahan cair, padat, gas, serta perubahan status kerusakan laboratorium dalam satu ruang kerja yang ringkas dan mudah dibaca.</p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="rounded-lg bg-lime-400 px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-lime-300">
                                Buka Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-lg bg-lime-400 px-5 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-lime-300">
                                Mulai Masuk
                            </a>
                        @endauth

                        <a href="#ringkasan" class="rounded-lg border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10"> Lihat Ringkasan </a>
                    </div>
                </div>

                <div id="ringkasan" class="grid gap-3 rounded-lg border border-white/15 bg-zinc-950/50 p-4 shadow-2xl backdrop-blur">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="rounded-lg border border-white/10 bg-white/10 p-4">
                            <div class="text-2xl font-semibold text-white">4</div>
                            <div class="mt-1 text-sm text-zinc-300">Kategori persediaan</div>
                        </div>
                        <div class="rounded-lg border border-white/10 bg-white/10 p-4">
                            <div class="text-2xl font-semibold text-white">24/7</div>
                            <div class="mt-1 text-sm text-zinc-300">Akses pemantauan</div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-lime-300/20 bg-lime-300/10 p-4">
                        <div class="text-sm font-semibold text-lime-100">Fokus operasional</div>
                        <div class="mt-2 text-sm leading-6 text-zinc-200">Inventaris, lokasi laboratorium, satuan stok, dan laporan kerusakan tersusun untuk keputusan cepat.</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
