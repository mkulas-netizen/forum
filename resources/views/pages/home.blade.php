@extends('welcome')
@section('content')
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="list-group">
                @foreach($tags as $tag)
                    <a href="#" class="list-group-item list-group-item-action">
                        {{ $tag->tag }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">
            @include('components.search')
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Článok</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Dátum vzniku</th>
                    <th scope="col">Akcia</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                <tr>
                    <th scope="row">{{ $article->title }}</th>
                    <td>{{ $article->user->name }}</td>
                    <td>{{ $article->tag->tag }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td><a href="{{ route('article.show',$article) }}">Zobraziť</a> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
