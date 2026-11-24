@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('main-class', 'max-w-reading')

@section('body')
    <article>
        <header class="border-b border-line pb-6">
            <a href="/blog/" class="inline-flex gap-1.5 text-sm font-semibold text-accent underline-offset-4 hover:underline">
                <span aria-hidden="true">←</span> Blog
            </a>

            <h1 class="mt-3 mb-4">{{ $page->title }}</h1>

            <div class="flex flex-wrap items-center gap-x-4 gap-y-2.5">
                <p class="font-mono text-xs font-semibold text-accent">
                    {{ $page->author }}
                    <span aria-hidden="true">·</span>
                    <time datetime="{{ $page->getDate()->format('Y-m-d') }}">{{ $page->getDate()->format('F j, Y') }}</time>
                </p>

                @if ($page->categories)
                    @php
                        $topicClasses = 'inline-block rounded border border-line px-2 py-0.5 text-xs font-semibold text-muted';
                    @endphp

                    <ul class="flex flex-wrap items-center gap-x-3 gap-y-2" aria-label="Topics">
                        @foreach ($page->categories as $category)
                            <li>
                                @if ($categoryPage = $categories->get($category))
                                    <a class="{{ $topicClasses }} hover:border-accent hover:text-accent" href="{{ $categoryPage->getUrl() }}">
                                        {{ $category }}
                                    </a>
                                @else
                                    <span class="{{ $topicClasses }}">{{ $category }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </header>

        <div class="mt-7">
            @if ($page->cover_image)
                <img class="mb-5 w-full rounded-lg" src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image">
            @endif

            <div class="prose">
                @yield('content')
            </div>
        </div>

        @php
            $older = $page->getNext();
            $newer = $page->getPrevious();
        @endphp

        @if ($older || $newer)
            <nav
                class="mt-7 grid grid-cols-2 gap-4 border-t border-line pt-6 [&>a]:self-start [&>a]:font-serif
                       [&>a]:text-lg [&>a]:leading-snug [&>a:hover]:text-accent"
                aria-label="Adjacent posts"
            >
                @if ($older)
                    <a href="{{ $older->getUrl() }}">
                        <span class="mb-1.5 block font-sans text-xs font-semibold text-accent">
                            <span aria-hidden="true">←</span> Older post
                        </span>
                        {{ $older->title }}
                    </a>
                @endif

                @if ($newer)
                    <a class="col-start-2 text-end" href="{{ $newer->getUrl() }}">
                        <span class="mb-1.5 block font-sans text-xs font-semibold text-accent">
                            Newer post <span aria-hidden="true">→</span>
                        </span>
                        {{ $newer->title }}
                    </a>
                @endif
            </nav>
        @endif
    </article>
@endsection
