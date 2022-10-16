<?php

namespace App\Models;

use App\Models\User;
use App\Models\posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['post_id','user_id','comment_body'];


    public function post()
    {
        return $this->belongsTo(posts::class,'post_id','id');
    }
    public function userfu()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }












}

