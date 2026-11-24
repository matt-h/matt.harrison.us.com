<div
    class="nav:relative"
    x-data="{
        fuse: null,
        searching: false,
        loading: false,
        failed: false,
        query: '',
        get results() {
            return this.fuse && this.query.trim() ? this.fuse.search(this.query.trim()) : [];
        },
        async open() {
            this.searching = true;
            this.$nextTick(() => this.$refs.search.focus());

            if (this.fuse || this.loading) return;

            this.loading = true;
            this.failed = false;

            try {
                const response = await fetch('/index.json');
                if (!response.ok) throw new Error('Search index unavailable');

                const data = await response.json();
                const parser = new DOMParser();
                for (const item of data) {
                    item.snippet = parser.parseFromString(item.snippet, 'text/html').body.textContent;
                }

                this.fuse = new window.Fuse(data, {
                    minMatchCharLength: 6,
                    keys: ['title', 'snippet', 'categories'],
                });
            } catch {
                this.failed = true;
            } finally {
                this.loading = false;
            }
        },
        reset() {
            this.searching = false;
            this.query = '';
        },
        close() {
            this.$refs.searchToggle.focus();
            this.reset();
        },
    }"
    @click.outside="reset()"
    @focusout="if (!$el.contains($event.relatedTarget)) reset()"
    @keydown.escape.stop="if (searching) close()"
    x-cloak
>
    <button
        class="inline-flex min-h-11 min-w-11 cursor-pointer items-center justify-center gap-2 rounded-lg border border-line
               bg-surface px-3 text-sm font-semibold hover:border-accent hover:text-accent
               aria-expanded:border-accent aria-expanded:text-accent nav:px-3.5"
        type="button"
        aria-label="Search posts"
        aria-controls="search-panel"
        aria-expanded="false"
        :aria-expanded="searching"
        x-ref="searchToggle"
        @click="searching ? close() : open()"
    >
        <img src="/assets/img/magnifying-glass.svg" alt="" class="size-4 dark:invert" width="16" height="16">
        <span class="hidden nav:inline">Search</span>
    </button>

    <div
        id="search-panel"
        class="absolute top-full right-0 z-1 w-full max-w-[25rem] overflow-hidden rounded-xl border border-line bg-surface shadow-xl
               nav:top-[calc(100%+0.65rem)] nav:w-[25rem]"
        role="search"
        x-show="searching"
        x-cloak
    >
        <label for="site-search-input" class="sr-only">Search posts</label>
        <div class="flex items-center gap-2 p-2">
            <input
                id="site-search-input"
                class="min-w-0 flex-1 rounded-md border border-line bg-paper px-3 py-2.5 placeholder:text-muted"
                x-model="query"
                x-ref="search"
                autocomplete="off"
                placeholder="Search posts"
                type="search"
            >
            <button
                class="grid size-11 cursor-pointer place-items-center rounded-lg text-2xl leading-none hover:text-accent"
                type="button"
                aria-label="Close search"
                @click="close()"
            >×</button>
        </div>

        <div class="max-h-[min(24rem,55vh)] overflow-y-auto border-t border-line" x-show="query.trim() || failed">
            <p class="px-4 py-3.5 text-sm text-muted empty:absolute empty:p-0" role="status"
                x-text="loading ? 'Searching…' : failed ? 'Search is unavailable. Try again in a moment.' : results.length ? '' : 'No matching posts.'"
            ></p>
            <div class="divide-y divide-line" x-show="results.length">
                <template x-for="result in results" :key="result.item.link">
                    <a
                        class="block px-4 py-3.5 text-sm text-muted hover:bg-surface-accent
                               focus-visible:bg-surface-accent focus-visible:-outline-offset-2"
                        :href="result.item.link"
                    >
                        <strong class="mb-1 block text-base text-ink" x-text="result.item.title"></strong>
                        <span x-text="result.item.snippet"></span>
                    </a>
                </template>
            </div>
        </div>
    </div>
</div>
