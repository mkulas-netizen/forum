<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\TagArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('pages.home',compact('articles'),['tags' => Tag::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.add_article',['tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string'
        ]);

        $article = Article::create([
            'text' => $request->text,
            'title' => $request->title
        ]);


        if ($request->input('tag') != null) {
            foreach ($request->input('tag') as $item) {

                TagArticle::create([
                    'tag_id' => $item,
                    'article_id' => $article->id
                ]);
            }
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $comments = Comment::where('article_id',$article->id)->paginate(1);

        return view('pages.article',
            compact('comments'),
            [
                'article' => $article,
                'tags' => TagArticle::with('tag')->where('article_id',$article->id)->get()
            ]
        );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/');
    }
}
