@extends('pages.layout')
@section('home')
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
        <tbody id="article">
        @if(count($articles) > 0)
            @foreach($articles as $article)
                <tr>
                    <th scope="row">{{ Str::limit( $article->title ,30)}}</th>
                    <td>{{ $article->user->name }}</td>
                    <td>{{ $article->tag->tag }}</td>
                    <td>{{  date(' H:i:s , d-M-Y', strtotime($article->created_at)) }}</td>
                    <td><a href="{{ route('article.show',$article) }}">Zobraziť</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
