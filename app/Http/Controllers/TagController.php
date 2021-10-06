<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {


       $articles =  Article::whereHas('tag', function($query) use ($tag) {
            $query->where('id' ,$tag->id);
        })->paginate(10);


        return view('pages.home',compact('articles'),['tags' => Tag::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $slug)
    {
        //
    }
}
