@extends ('layout')

@section ('content')

    @foreach($articles as $article)

        <div class="title">
            <h3><a href="/articles/{{ $article->id }}">{{ $article->title}}</a></h3>
        </div>
        <p>{{ $article->excerpt }}</p>

    @endforeach

@endsection
