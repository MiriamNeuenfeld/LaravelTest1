@extends ('layout')

@section ('content')

    @forelse($articles as $article)
        <div class="title">
            <h2><a href="{{ $article->path() }}">{{ $article->title}}</a></h2>
        </div>

        <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>

        <p>{!! $article->excerpt !!}</p>
    @empty
        <p>No relevant articles yet.</p>
    @endforelse

@endsection
