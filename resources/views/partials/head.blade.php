<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>
    {{ filled($title ?? null) ? $title.' - '.config('app.name', 'Laravel') : config('app.name', 'Laravel') }}
</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@php
    $serverTheme = auth()->user()?->theme;
@endphp

<script>
    (() => {
        const storageKey = 'sivo.theme';
        const fluxStorageKey = 'flux.appearance';
        const root = document.documentElement;
        const validThemes = ['light', 'dark', 'green'];
        const serverTheme = @js($serverTheme);
        const normalizeTheme = (theme) => theme === 'emerald' ? 'green' : theme;

        const syncFluxAppearance = (theme) => {
            const fluxAppearance = theme === 'dark' ? 'dark' : 'light';

            window.localStorage.setItem(fluxStorageKey, fluxAppearance);
        };

        const applyTheme = (theme) => {
            const normalizedTheme = normalizeTheme(theme);
            const selected = validThemes.includes(normalizedTheme) ? normalizedTheme : 'dark';

            syncFluxAppearance(selected);
            root.classList.remove('dark', 'theme-green');

            if (selected === 'dark') {
                root.classList.add('dark');
            }

            if (selected === 'green') {
                root.classList.add('theme-green');
            }

            root.dataset.theme = selected;
        };

        const initialTheme = validThemes.includes(normalizeTheme(serverTheme))
            ? normalizeTheme(serverTheme)
            : (window.localStorage.getItem(storageKey) || 'dark');

        applyTheme(initialTheme);
        window.localStorage.setItem(storageKey, initialTheme);

        window.SivoTheme = {
            getTheme: () => root.dataset.theme || initialTheme,
            setTheme: (theme) => {
                if (! validThemes.includes(theme)) return;

                window.localStorage.setItem(storageKey, theme);
                applyTheme(theme);
            },
        };

        window.addEventListener('storage', (event) => {
            if (event.key === storageKey && validThemes.includes(normalizeTheme(event.newValue))) {
                applyTheme(event.newValue);
            }
        });
    })();
</script>

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
