<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookModel extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'book_models';
    protected $fillable =['book_description','book_image','book_author','author_id'];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    // protected $guarded = ['id'];
    // public $timestamps = true;
    // protected $primaryKey = 'id';
}
