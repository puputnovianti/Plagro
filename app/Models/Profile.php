<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function idealProfile()
    {
        return $this->hasMany(IdealProfile::class);
    }

    public function retailerProfile()
    {
        return $this->hasOne(RetailerProfile::class);
    }
}
