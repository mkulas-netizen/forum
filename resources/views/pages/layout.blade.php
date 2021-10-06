@extends('welcome')
@section('content')
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="list-group">
                @foreach($tags as $tag)
                    <a href="{{ route('tag.show',$tag) }}" class="list-group-item list-group-item-action">
                        {{ $tag->tag }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">
            @include('components.search')
            @auth()
                <a href="{{ route('article.create') }}" class="btn btn-sm btn-success mt-2 mb-2">Vytvoriť nový príspevok</a>
            @endauth
            @yield('home')
            <div class="d-flex justify-content-center">
                {!! $articles->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection

