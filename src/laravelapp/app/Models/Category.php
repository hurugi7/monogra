<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Item;

class Category extends Model
{
    use HasFactory;

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function items()
    {
        return $this->hasManyThrough(Item::class, SubCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
