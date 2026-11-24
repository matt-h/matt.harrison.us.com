@extends('_layouts.main')

@section('main-class', 'max-w-reading')

@section('body')
    <header class="prose border-b border-line pb-6">
        <h1>{{ $page->title }}</h1>
        @yield('content')
    </header>

    @foreach ($page->posts($posts) as $post)
        @include('_components.post-preview-inline')
    @endforeach
@stop
