@extends ('layout')

@section ('content')

    @foreach($articles as $article)

        <div class="title">
            <h2>
                <a href={{ $article->path() }}>
                    {{ $article->title}}
                </a>
            </h2>
        </div>
        <p>{{ $article->excerpt }}</p>

    @endforeach

@endsection
