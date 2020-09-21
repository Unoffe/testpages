<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'text', 'active', 'post_id', 'user_id'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public static function active() {
        return self::where('active', 1)->get();
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
