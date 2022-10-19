<?php

namespace App\Models;

use App\Models\BookModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->hasMany(BookModel::class);
    }
    protected $fillable =['nationality','author_email','author_name'];

}
