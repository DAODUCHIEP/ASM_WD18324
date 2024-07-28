<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product'; 
    public $primarykey = 'id';


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
   public $fillable = [
    'name',
    'image',
    'category_id',
    'price',
    'description'
   ];
    
}