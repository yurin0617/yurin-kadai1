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
    public static $rules = array(
        'first_name' => ['required', 'string', 'max:8'],
        'last_name' => ['required', 'string', 'max:8'],
        'gender' => ['required'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'tel' => ['required', 'numeric', 'digits_between:1,15'],
        'address' => ['required'],
        'building' => ['nullable'],
        'category_id' => ['required'],
        'detail' => ['required', 'string', 'max:120'],
    );
    public function getDetail()
    {
        $txt = 'ID:' . $this->id . ' ' . $this->first_name . $this->last_name . '様 ' . $this->gender . $this->email . $this->tel . $this->address . $this->building . $this->category_id->content . $this->detail;
        return $txt;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
