<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemPhoto;
use App\Models\SubCategory;

class Item extends Model
{
    use HasFactory;

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function photos()
    {
        return $this->hasMany(ItemPhoto::class);
    }
}
