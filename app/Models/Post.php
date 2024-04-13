<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sub;

class Post extends Model
{
    use HasFactory;
    
    public function sub()
    {
        return $this -> belongsTo(Sub::class);
    }
    
    protected $fillable = [
        'sub_id',
        'content',
        'category_id',
    ];
}
