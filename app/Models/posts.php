<?php

namespace App\Models;

use App\Models\User;
use App\Models\comments;
use App\Models\categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'categorie_id',
        'name',
        'slug',
        'description',
        'yt_iframe',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'created_by'
    ];

    public function categorie()
    {
        return $this->belongsTo(categories::class, 'categorie_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }
    public function comments()
    {
        return $this->hasMany(comments::class, 'post_id','id');
    }
}
