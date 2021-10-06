<?php

namespace App\Http\Controllers;



use App\Models\Article;
use Illuminate\Support\Facades\App;

class RssController extends Controller
{
    public function rssFeed()
    {
        /* create new feed */
        $feed = App::make("feed");
        /* Take out 15 posts from database to create feed */
        $posts = Article::get();
        /* Set feed's title, description, link, publish date and language */
        $feed->title = 'Feedtitle';
        $feed->description = 'Feed description';
        $feed->logo = 'logo url';
        $feed->link = url('feed');
        $feed->setDateFormat('datetime');
        $feed->pubdate = $posts[0]->created_at;
        $feed->lang = 'en';
        $feed->setShortening(true);
        $feed->setTextLimit(100);
        foreach ($posts as $post)
        {
            $feed->add($post->title, $post->author, URL::to($post->title), $post->created_at, $post->text, $post->updated_at);
        }
        return $feed->render('atom');

    }
}
