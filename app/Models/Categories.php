<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image'];

    public function products()
    {
        return $this->hasMany(products::class);
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategories::class);
    }
}
