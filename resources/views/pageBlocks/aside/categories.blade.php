<div><a href="{{ route('slugs') }}"><b>Категории</b></a></div>
@forelse($categories as $cat)
    <div><a href="{{$cat['link']}}">{{$cat['name']}}</a></div>
@empty
    <div>categories not found</div>
@endforelse

