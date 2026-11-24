<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="color-scheme" content="light dark">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="{{ $page->type ?? 'website' }}" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">
        <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        @viteRefresh()
        <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ vite('source/_assets/css/prism.css') }}">
        <script defer type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
        <script defer type="module" src="{{ vite('source/_assets/js/prism.js') }}"></script>
    </head>

    <body class="flex min-h-screen flex-col bg-paper font-sans leading-[1.6] text-ink scheme-light-dark">
        <a class="fixed top-3 left-3 z-10 -translate-y-[200%] rounded-md bg-surface px-4 py-2.5 text-accent focus:translate-y-0" href="#main-content">Skip to content</a>

        <header
            class="relative z-2 border-b border-line"
            x-data="{ menuOpen: false }"
            @click.outside="menuOpen = false"
            @keydown.escape="if (menuOpen) { menuOpen = false; $refs.menuToggle.focus() }"
        >
            <div class="relative mx-auto flex min-h-17 w-[calc(100%_-_2*var(--spacing-page))] max-w-site
                       items-center gap-2.5 nav:min-h-19 nav:gap-6 lg:gap-10">
                <a href="/" class="mr-auto inline-flex items-center gap-2.5 text-xl font-bold tracking-tight">
                    <span class="grid size-10 place-items-center rounded-xl bg-masthead">
                        <img class="size-7 invert" src="/assets/img/matt-logo.svg" alt="" width="28" height="28">
                    </span>
                    {{ $page->siteName }}
                </a>

                @include('_nav.menu-toggle')
                @include('_nav.menu')
                @include('_components.search')
            </div>
        </header>

        <main
            id="main-content"
            class="mx-auto w-[calc(100%_-_2*var(--spacing-page))] flex-1 pt-[clamp(2rem,4vw,3.75rem)]
                   pb-[clamp(3.5rem,7vw,6rem)] outline-none @yield('main-class', 'max-w-reading prose')"
            tabindex="-1"
        >
            @yield('body')
        </main>

        <footer class="border-t border-line text-sm text-muted">
            <div class="mx-auto flex w-[calc(100%_-_2*var(--spacing-page))] max-w-site flex-wrap
                        justify-between gap-x-8 gap-y-1 py-5">
                <p>&copy; {{ date('Y') }} {{ $page->siteAuthor }}</p>
                <p>
                    Built with <a class="underline underline-offset-2 hover:text-accent" href="https://jigsaw.tighten.com/">Jigsaw</a>
                    and <a class="underline underline-offset-2 hover:text-accent" href="https://tailwindcss.com">Tailwind CSS</a>.
                </p>
            </div>
        </footer>

        @stack('scripts')
    </body>
</html>
