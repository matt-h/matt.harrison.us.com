<nav
    id="site-nav"
    class="hidden nav:flex nav:items-center nav:gap-6 lg:gap-8
           max-nav:absolute max-nav:inset-x-0 max-nav:top-full max-nav:divide-y max-nav:divide-line
           max-nav:rounded-lg max-nav:border max-nav:border-line max-nav:bg-surface max-nav:px-4
           max-nav:py-2 max-nav:shadow-lg max-nav:data-[open=true]:grid"
    aria-label="Main navigation"
    :data-open="menuOpen"
>
    @foreach (['/blog/' => 'Blog', '/about/' => 'About', '/license/' => 'License', '/projects/' => 'Projects'] as $path => $label)
        <a
            class="py-2.5 text-sm font-semibold text-muted underline-offset-4
                   hover:text-accent hover:underline aria-[current]:text-accent aria-[current]:underline"
            href="{{ $path }}"
            @if ($page->isActive($path)) aria-current="page"
            @elseif ($path === '/blog/' && str_starts_with($page->getPath(), $path)) aria-current="location"
            @endif
        >{{ $label }}</a>
    @endforeach
</nav>
