<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    use HasFactory;
    const created_at = 'created_at';

    protected $hidden = ['user_id'];
    protected $fillable = ['title', 'text'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->user_id = Auth::user()->id;
            return $model;
        });

        self::retrieved(function ($model){
           return $model->created_at = date(' H:i:s , d-M-Y', strtotime($model->created_at));
        });


        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy(self::created_at, 'desc');

        });

    }



    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function tag(): HasOne
    {
        return $this->hasOne(Tag::class,'id','tag_id');
    }

    public function comments(){
        return $this->belongsTo(Comment::class);
    }
}
