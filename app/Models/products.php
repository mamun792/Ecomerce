<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'sub_category_id',
        'image',
        'slug',
        'quantity'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategories::class, 'sub_category_id');
    }

    public function transactions()
    {
        return $this->belongsToMany(transaction::class);
    }
    
}
