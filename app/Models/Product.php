<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $keyType = 'integer';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'id',
        'name',
        'price',
        'category',
        'description',
        'image_url',
        'created_at',
        'updated_at',
        'status',
        'deleted_at',
    ];
}
