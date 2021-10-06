<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagArticle extends Model
{
    use HasFactory;

    protected $fillable = ['article_id','tag_id'];
    public $timestamps = false;

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
