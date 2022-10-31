<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingInventory extends Model
{
    use HasFactory;

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function category()
    {
        return $this->belongsTo(BuildingCategory::class, 'category_id');
    }

    public function size()
    {
        return $this->belongsTo(BuildingSize::class, 'size_id');
    }

    public function block()
    {
        return $this->belongsTo(BuildingBlock::class, 'block_id');
    }
}
