---
title: Blog
description: The list of blog posts for the site
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.main')

@section('main-class', 'max-w-reading')

@section('body')
    <div class="flex flex-wrap items-baseline justify-between gap-x-6 gap-y-2.5 border-b border-line pb-4">
        <h1>Blog</h1>
        <a href="/blog/feed.atom" class="inline-flex gap-1.5 text-sm font-semibold text-accent underline-offset-4 hover:underline">
            Atom feed <span aria-hidden="true">↗</span>
        </a>
    </div>

    @foreach ($pagination->items as $post)
        @include('_components.post-preview-inline')
    @endforeach

    @if ($pagination->pages->count() > 1)
        @php
            $pageLinkClasses = 'grid size-11 place-items-center rounded-md border border-line font-semibold text-accent hover:border-accent';
        @endphp

        <nav class="mt-7 flex flex-wrap gap-2" aria-label="Blog pages">
            @if ($previous = $pagination->previous)
                <a class="{{ $pageLinkClasses }}" href="{{ $previous }}" rel="prev" aria-label="Previous page">←</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                    class="{{ $pageLinkClasses }} aria-[current=page]:border-accent aria-[current=page]:bg-accent aria-[current=page]:text-paper"
                    href="{{ $path }}"
                    aria-label="Page {{ $pageNumber }}"
                    @if ($pagination->currentPage == $pageNumber) aria-current="page" @endif
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a class="{{ $pageLinkClasses }}" href="{{ $next }}" rel="next" aria-label="Next page">→</a>
            @endif
        </nav>
    @endif
@stop
