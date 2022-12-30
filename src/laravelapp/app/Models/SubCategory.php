<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Item;

class SubCategory extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class, 'sub_category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
