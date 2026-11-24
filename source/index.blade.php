@extends('_layouts.main')

@section('main-class', 'max-w-site')

@section('body')
    <section
        class="rounded-2xl border border-line bg-masthead px-6 py-12 text-center text-masthead-ink sm:px-12 sm:py-16"
        aria-labelledby="home-title"
    >
        <span class="mx-auto mb-6 block h-0.5 w-11 bg-masthead-accent" aria-hidden="true"></span>
        <h1 id="home-title" class="mx-auto max-w-3xl text-balance text-[clamp(2.85rem,5.25vw,4.85rem)] leading-none font-medium">
            Notes on code and the web.
        </h1>
        <p class="mx-auto mt-6 max-w-[52ch] text-pretty text-[clamp(1rem,1.6vw,1.15rem)] text-masthead-muted">
            I’m {{ $page->siteAuthor }}, a web developer and open-source enthusiast. This is where I write about what I’m building and learning.
        </p>
    </section>

    @php
        $featuredPosts = $posts->where('featured', true);
        $recentPosts = $posts->where('featured', false)->take(6);
    @endphp

    @if ($featuredPosts->isNotEmpty())
        <section class="mt-10 sm:mt-16" aria-labelledby="featured-title">
            <h2 id="featured-title" class="border-b border-line pb-4">Featured posts</h2>

            <div class="grid gap-x-8 nav:grid-cols-2 lg:gap-x-16">
                @foreach ($featuredPosts as $post)
                    @include('_components.post-preview-inline', ['headingLevel' => 3, 'showCover' => true, 'excerptLength' => 255])
                @endforeach
            </div>
        </section>
    @endif

    <section class="mt-10 sm:mt-16" aria-labelledby="writing-title">
        <div class="flex flex-wrap items-baseline justify-between gap-x-6 gap-y-2.5 border-b border-line pb-4">
            <h2 id="writing-title">Recent writing</h2>
            <a href="/blog/" class="inline-flex gap-1.5 text-sm font-semibold text-accent underline-offset-4 hover:underline">
                View archive <span aria-hidden="true">→</span>
            </a>
        </div>

        <div class="grid gap-x-8 nav:grid-cols-2 lg:gap-x-16">
            @foreach ($recentPosts as $post)
                @include('_components.post-preview-inline', ['headingLevel' => 3])
            @endforeach
        </div>
    </section>
@stop
