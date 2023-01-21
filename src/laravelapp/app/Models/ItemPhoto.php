<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class ItemPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'path'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
