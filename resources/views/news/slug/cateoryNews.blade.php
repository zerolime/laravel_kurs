@extends('layouts.common')

@section('pageTitle' , "Новости категории {}")

@section('aside')
    @include('pageBlocks.aside.categories', ['categories' => $categories])
@endsection

@section('content')
    @forelse($news as $article)
        <article>
            <h1>
                <a href="{{ route('detail', ['id' => $article['id']]) }}">{{ $article['title'] }}</a>
            </h1>
            <div class="author">автор: {{ $article['author'] }}</div>
            <div class="slags">
                @forelse($article['slugs'] as $slug)
                    <a href="{{ $slug['link'] }}">{{ $slug['name'] }}</a>@if(!$loop->last),@endif
                @empty
                    article has no categories
                @endforelse
            </div>
            @if ($article['private'])
                <div class="article-text">текст статьи доступен по подписке</div>
            @else
                <div class="article-text">
                    {{ $article['text'] }}
                </div>
                <div>
                    <a href="{{ route('detail', ['id' => $article['id']]) }}">
                        <i>подробнее...</i>
                    </a>
                </div>
            @endif
        </article>
    @empty
        <div>news not found</div>
    @endforelse
@endsection

