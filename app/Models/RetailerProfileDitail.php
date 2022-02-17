<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailerProfileDitail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function retailerProfile()
    {
        return $this->belongsTo(RetailerProfile::class);
    }
}
