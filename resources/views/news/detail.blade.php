@extends('layouts.common')

@section('pageTitle' , $article['title'])

@section('content')
    <div>
    @if($article['private'])
        <p>Новость доступна по подписке</p>
    @else
        <p>
            {{ $article['text'] }}
        </p>
    @endif
        <div class="author">{{ $article['author'] }}</div>
    </div>
@endsection

@section('aside')
    @include('pageBlocks.aside.similarNews', ['similarNews' => $similarNews])
@endsection

