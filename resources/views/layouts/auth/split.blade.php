<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    @class ([
        'dark' => auth()->user()?->theme === 'dark',
        'theme-green' => auth()->user()?->theme === 'green',
    ])
>
<head>
    @include ('partials.head')
</head>
<body class="min-h-screen bg-white antialiased dark:bg-neutral-950">
    <div class="relative min-h-dvh lg:grid lg:grid-cols-5">
        <div class="login-form-panel relative flex w-full items-center justify-center overflow-hidden px-6 py-12 sm:px-10 lg:col-span-2 lg:px-14 xl:px-18">
            <div
                class="login-form-panel-bg absolute inset-0 bg-radial-[circle_at_top] from-white via-stone-50 to-stone-100 dark:from-neutral-900 dark:via-neutral-950 dark:to-black"
            ></div>
            <div class="login-form-divider absolute inset-y-0 right-0 hidden w-px bg-gradient-to-b from-transparent via-stone-300 to-transparent lg:block dark:via-white/10"></div>

            <div class="relative z-10 w-full max-w-md">
                <a href="{{ route('landing') }}" class="mb-8 flex items-center gap-3 font-medium" wire:navigate>
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-stone-900 text-white shadow-lg shadow-stone-950/10 dark:bg-white dark:text-neutral-950">
                        <x-app-logo-icon class="h-7 fill-current" />
                    </span>
                    <span class="text-sm font-semibold tracking-[0.24em] text-stone-500 uppercase dark:text-neutral-400"> {{ config('app.name', 'Laravel') }} </span>
                </a>

                <div
                    class="login-form-card rounded-[2rem] border border-stone-200/80 bg-white/90 p-8 shadow-2xl shadow-stone-950/8 backdrop-blur-sm sm:p-10 dark:border-white/10 dark:bg-white/5 dark:shadow-black/30"
                >
                    {{ $slot }}
                </div>
            </div>
        </div>

        <div class="login-hero-panel relative hidden min-h-dvh overflow-hidden lg:col-span-3 lg:flex">
            <div
                class="login-hero-wallpaper absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(251,191,36,0.22),_transparent_28%),radial-gradient(circle_at_20%_30%,_rgba(56,189,248,0.24),_transparent_32%),linear-gradient(135deg,_#0f172a_0%,_#111827_38%,_#1f2937_100%)]"
            ></div>
            <div
                class="login-hero-grid absolute inset-0 opacity-40 [background-image:linear-gradient(rgba(255,255,255,0.08)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.08)_1px,transparent_1px)] [background-size:3.5rem_3.5rem]"
            ></div>
            <div class="login-hero-glow-primary absolute -left-24 top-20 h-72 w-72 rounded-full bg-cyan-300/20 blur-3xl"></div>
            <div class="login-hero-glow-secondary absolute bottom-12 right-10 h-80 w-80 rounded-full bg-amber-300/20 blur-3xl"></div>
            <div class="login-hero-overlay absolute inset-0 bg-linear-to-br from-white/5 via-transparent to-black/20"></div>

            @php
                    [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
                @endphp

            <div class="relative z-10 flex h-full w-full flex-col justify-between p-12 text-white xl:p-16">
                <div class="max-w-xl space-y-6">
                    <span
                        class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-1 text-xs font-medium tracking-[0.3em] uppercase text-white/80 backdrop-blur-sm"
                    >
                        Welcome Back
                    </span>
                    <div class="space-y-4">
                        <h1 class="max-w-2xl text-4xl font-semibold leading-tight text-balance xl:text-5xl">One secure place to manage your work, data, and daily flow.</h1>
                        <p class="max-w-xl text-base leading-7 text-white/70 xl:text-lg">Sign in to continue where you left off and keep everything moving without losing context.</p>
                    </div>
                </div>

                <div class="login-hero-quote max-w-2xl rounded-[2rem] border border-white/10 bg-white/10 p-8 backdrop-blur-md">
                    <blockquote class="space-y-3">
                        <flux:heading size="lg" class="text-white/95">&ldquo;{{ trim($message) }}&rdquo;</flux:heading>
                        <footer><flux:heading class="text-white/70">{{ trim($author) }}</flux:heading></footer>
                    </blockquote>
                </div>
            </div>
        </div>

        <div class="px-6 pb-8 lg:hidden">
            <a href="{{ route('landing') }}" class="z-20 flex flex-col items-center gap-2 font-medium" wire:navigate>
                <span class="flex h-9 w-9 items-center justify-center rounded-md">
                    <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                </span>

                <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
            </a>
        </div>
    </div>

    @persist ('toast')
        <flux:toast.group>
            <flux:toast />
        </flux:toast.group>
    @endpersist

    @fluxScripts
</body>
</html>
