<button
    class="inline-flex size-11 cursor-pointer items-center justify-center rounded-lg border border-line bg-surface
           hover:border-accent hover:text-accent aria-expanded:border-accent aria-expanded:text-accent nav:hidden"
    type="button"
    aria-label="Menu"
    aria-controls="site-nav"
    aria-expanded="false"
    :aria-expanded="menuOpen"
    x-ref="menuToggle"
    @click="menuOpen = !menuOpen"
>
    <span class="flex h-3 w-4 items-center border-y" aria-hidden="true">
        <span class="h-px w-full bg-current"></span>
    </span>
</button>
