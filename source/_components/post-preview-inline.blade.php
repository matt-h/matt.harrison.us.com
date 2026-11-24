<article class="border-b border-line py-6">
    @if (($showCover ?? false) && $post->cover_image)
        <img class="mb-5 w-full rounded-lg" src="{{ $post->cover_image }}" alt="" loading="lazy">
    @endif

    <time class="font-mono text-xs font-semibold text-accent" datetime="{{ $post->getDate()->format('Y-m-d') }}">
        {{ $post->getDate()->format('F j, Y') }}
    </time>

    <h{{ $headingLevel ?? 2 }} class="mt-2 text-[clamp(1.65rem,2.55vw,2.25rem)]">
        <a href="{{ $post->getUrl() }}" class="decoration-1 underline-offset-[0.16em] hover:text-accent hover:underline">
            {{ $post->title }}
        </a>
    </h{{ $headingLevel ?? 2 }}>

    <p class="mt-2.5 wrap-anywhere text-muted [&_code]:rounded [&_code]:bg-surface-accent [&_code]:px-1 [&_code]:text-[0.9em]">
        {!! $post->getExcerpt($excerptLength ?? 200) !!}
    </p>
</article>
