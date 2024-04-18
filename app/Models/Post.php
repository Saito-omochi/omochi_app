<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sub;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function sub()
    {
        return $this -> belongsTo(Sub::class);
    }
    
    public function getpaginate(int $number)
    {
        return $this::all() -> with('sub') ->orderby('updated_at', 'DESC')->paginate($number);
    }
    
    protected $fillable = [
        'sub_id',
        'content',
        'category_id',
    ];
}
