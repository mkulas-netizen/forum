<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->user_id = Auth::user()->id;
            return $model;
        });

    }

    protected $hidden = ['user_id'];
    protected $fillable = ['title', 'text'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function tag(): HasOne
    {
        return $this->hasOne(Tag::class,'id','tag_id');
    }
}
