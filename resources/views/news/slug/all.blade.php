@extends('layouts.common')

@section('pageTitle' , 'Новости по категориям')

@section('aside')
    @include('pageBlocks.aside.categories', ['categories' => $categories])
@endsection

@section('content')
    @forelse($categories as $cat)

        <h2>{{ $cat['name'] }}</h2>

        @forelse($cat['news'] as $article)
        <article>
            <h1>
                <a href="{{ route('detail', ['id' => $article['id']]) }}">{{ $article['title'] }}</a>
            </h1>
            <div class="author">автор: {{ $article['author'] }}</div>
            @if ($article['private'])
                <div class="article-text">текст статьи доступен по подписке</div>
            @else
                <div class="article-text">
                    {{ $article['text'] }}
                </div>
            @endif
        </article>
        @empty
            <div>news not found</div>
        @endforelse

        <div>
            <a href="{{ route('slug', [ 'slug' => $cat['slug'] ]) }}">
                <i>Все новости категории</i>
            </a>
        </div>

    @empty
        <div>categories not found</div>
    @endforelse
@endsection
