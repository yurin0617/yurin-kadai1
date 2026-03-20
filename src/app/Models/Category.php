<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        '商品のお届けについて',
        '商品の交換について',
        '商品トラブル',
        'ショップへのお問い合わせ',
        'その他',
    ];
}
