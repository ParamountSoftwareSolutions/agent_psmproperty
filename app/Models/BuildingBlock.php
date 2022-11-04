<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingBlock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function inventory()
    {
        return $this->hasMany(BuildingInventory::class, 'block_id');
    }
}
