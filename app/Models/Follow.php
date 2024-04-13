<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sub;

class Follow extends Model

{
    use HasFactory;
    
    public function sub()
    {
        return $this -> belongsTo(Sub::class,'followed_id','id');
    }
    
    protected $fillable = [
        'following_id',
        'followed_id',
    ];
}
