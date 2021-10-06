@extends('welcome')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="card" style="">
                    <div class="card-body text-center">
                        <h5 class="card-title"><b>{{ $article->title }}</b></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Autor : {{ $article->user->name }}</h6>
                        <p class="card-text">{{ $article->text }}</p>
                        <div class="text-right">
                            <small
                                class="text-right">Vytvorené: {{ date(' H:i:s , d-M-Y', strtotime($article->created_at)) }}</small><br>
                            @isset($article->updated_at)
                                <small
                                    class="text-right">Upravené: {{ date(' H:i:s , d-M-Y', strtotime($article->updated_at))}}</small>
                            @endisset
                        </div>
                        @foreach($tags as $tag)
                            <small class="p-2 bg-dark text-white m-2"> {{ $tag->tag->tag }}</small>
                        @endforeach
                    </div>
                </div>
                <div class="mt-5 ml-auto mr-auto w-75 ">
                    @auth()
                    <div class="form-group">
                        <form method="post" action="{{ route('comment.store') }}">
                            @csrf
                            <label for="description"></label>
                            <textarea class="form-control" id="description" placeholder="Nový komentár"
                                      name="comment" rows="10" cols="5"></textarea>
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <div class="m-2  ml-auto mr-auto text-center">
                                <button type="submit" class="btn btn-sm btn-success w-100">Vytvoriť komntár</button>
                            </div>
                        </form>
                    </div>
                    @endauth

                    @if(count($comments) > 0)
                        @foreach($comments as $comment)
                            <div class="card">
                                <div class="card-header">
                                    <cite title="Source Title">{{ $comment->user->name }}</cite>
                                </div>
                                <div class="card-body">
                                    <section class="card-text">{!! $comment->comment !!} </section>
                                    <small>Vytvorené:{{ date(' H:i:s , d-M-Y', strtotime($comment->created_at)) }}</small>
                                    @isset($comment->updated_at)
                                        <small>Upravené
                                            : {{ date(' H:i:s , d-M-Y', strtotime($comment->updated_at)) }}</small>
                                    @endisset
                                </div>
                            </div>
                        @endforeach
                    @else
                        <small class="text-center">Neexistuju komentáre</small>
                    @endif
                    <div class="d-flex mt-2 justify-content-center">
                        {!! $comments->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });



    </script>


@endsection
