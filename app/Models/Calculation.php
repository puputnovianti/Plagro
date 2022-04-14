<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Calculation extends Model
{

    use HasFactory;


    protected $guarded = [];

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }


    public $sortable = [
        'total_score',
        'created_at'
    ];
}
