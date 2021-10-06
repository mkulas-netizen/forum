<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment','article_id'];
    const created_at = 'created_at';


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->user_id = Auth::user()->id;
            $model->created_at = Carbon::now();
            return $model;
        });

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy(self::created_at, 'desc');
        });
    }



    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
