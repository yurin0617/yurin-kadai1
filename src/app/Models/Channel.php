<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    protected $fillable = [
        '自社サイト',
        '検索エンジン',
        'SNS',
        'テレビ・新聞',
        '友人・知人',
    ];
}
