@extends('welcome')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="
                    @isset($article)
                    {{ route('article.update',$article) }}
                    @else
                     {{ route('article.store') }}
                     @endisset
                    ">
                    @isset($article)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div class="form-group">
                        <label for="title">Nadpis príspevku</label>
                        <input type="text" name="title" id="title" class="form-control"
                               @isset($article)
                                    value="{{ $article->title }}"
                               @endisset
                               placeholder="Nadpis" required>
                        <label for="article_new">Text príspevku</label>
                        <textarea id="article_new" rows="10" class="form-control" name="text"
                                  placeholder="Váš príspevok" >
                            @isset($article)
                                {!! $article->text !!}
                            @endisset
                        </textarea>
                    </div>
                        @if( !$article)
                    @foreach($tags as $tag)
                        <input type="checkbox" id="tag{{ $tag->id }}" class="form-check-label" name="tag[]" value="{{ $tag->id }}">
                        <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->tag }}</label>
                    @endforeach
                        @endif

                    <div class="mt-5 text-center">
                        @isset($article)
                            <button type="submit" class="btn btn-sm btn-outline-danger">Upraviť príspevok</button>
                        @else
                            <button type="submit" class="btn btn-sm btn-dark">Vytvoriť príspevok</button>
                        @endisset
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#article_new'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
