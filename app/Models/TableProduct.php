<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_category',
        'id_priduce',
        'photo',
        'name',
        'regular_price',
        'sale_price',
        'discount',
        'code',
        'stt',
        'desc',
        'content',
        'stock',
        'status',
        'slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function idCategory()
    {
        return $this->belongsTo(TableCategory::class);
    }

    public function idPriduce()
    {
        return $this->belongsTo(TablePrduce::class);
    }
}
