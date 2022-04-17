<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class Retailer extends Authenticatable
{
    use HasFactory, Sortable;

    protected $guarded = ['id'];

    public $sortable = [
        'id',
        'name',
        'email',
        'location',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function retailerProfiles()
    {
        return $this->hasMany(RetailerProfile::class);
    }

    public function retailerDetails()
    {
        return $this->hasMany(RetailerDetail::class);
    }

    public function calculation()
    {
        return $this->hasOne(Calculation::class);
    }
}
