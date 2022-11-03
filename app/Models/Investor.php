<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function invest()
    {
        return $this->belongsTo(User::class, 'invest_to');
    }
    public function history()
    {
        return $this->hasMany(InvestorHistory::class, 'investor_id');
    }
}
