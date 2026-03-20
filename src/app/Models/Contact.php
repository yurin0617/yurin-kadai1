<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
    ];
    public function channels()
    {
        return $this->belongsToMany(Channel::class, 'contact_channel');
    }

    public function getDetail()
    {
        $txt = 'ID:' . $this->id . ' ' . $this->first_name . $this->last_name . '様 ' . $this->gender . $this->email . $this->tel . $this->address . $this->building . $this->category->content . $this->detail;
        return $txt;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
