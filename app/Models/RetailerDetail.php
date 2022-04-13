<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailerDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }
}
