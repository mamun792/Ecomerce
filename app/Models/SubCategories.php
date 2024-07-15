<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'category_id',
        'slug',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function products()
    {
        return $this->hasMany(products::class);
    }

    
}
