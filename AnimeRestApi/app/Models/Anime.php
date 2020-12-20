<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    protected $fillable=['name','description','rating','image_url','file_url'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
