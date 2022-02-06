<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function criteria()
    {
        return $this->hasMany(Criteria::class);
    }
}
