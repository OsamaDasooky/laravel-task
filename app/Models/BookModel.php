<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;

    protected $table = 'book_models';

    protected $guarded = ['id'];
    public $timestamps = false;
    // protected $primaryKey = 'id';
}
