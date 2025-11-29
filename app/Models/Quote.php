<?php
namespace App\Models;

use illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Quote extends Model{
    protected $fillable = [
        'symbol',
        'price',
        'change',
        'change_percent',
        'fetched_at',
    ];
    protected $casts = [
        'price' => 'float',
        'change' => 'float',
        'fetched_at' => 'datetime',
    ];
}