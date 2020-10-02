<div><a href="{{ route('slugs') }}"><b>Похожие новости</b></a></div>
@forelse($similarNews as $article)
    <div><a href="{{route('detail', ['id' => $article['id']])}}">{{$article['title']}}</a></div>
@empty
    <div>articles not found</div>
@endforelse
