@extends('welcome')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('article.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Nadpis príspevku</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Nadpis" required>
                        <label for="article_new">Text príspevku</label>
                        <textarea id="article_new" rows="10" class="form-control" name="text" placeholder="Váš príspevok" ></textarea>
                    </div>
                    @foreach($tags as $tag)
                        <input type="checkbox" id="tag{{ $tag->id }}" class="form-check-label" name="tag[]" value="{{ $tag->id }}">
                        <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->tag }}</label>
                    @endforeach

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn btn-sm btn-dark">Vytvoriť príspevok</button>
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
