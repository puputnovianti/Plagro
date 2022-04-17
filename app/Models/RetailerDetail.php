<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class RetailerDetail extends Model
{
    use HasFactory, Sortable;
    protected $guarded = [];

    public $sortable = [
        'id',
        'retailer_id',
        'gap',
        'created_at'
    ];


    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }
}
