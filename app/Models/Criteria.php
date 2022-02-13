<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function factor()
    {
        return $this->belongsTo(Factor::class);
    }

    public function idealProfile()
    {
        return $this->hasOne(IdealProfile::class);
    }
}
