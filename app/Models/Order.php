<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $keyType = 'bigInteger';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'id',
        'code',
        'status',
        'created_at',
        'updated_at'
    ];
}
