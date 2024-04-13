<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Follow;
use App\Models\User;

class Sub extends Model
{
    use HasFactory;
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function follows()
    {
        return $this->hasMany(Follow::class);
    }
    
    protected $fillable = [
        'name',
        'user_id',
        'profiletext',
        'icon',
        'seacret',
    ];
}
