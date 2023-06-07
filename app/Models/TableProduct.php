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
        'id_produce',
        'id_author',
        'photo',
        'name',
        'regular_price',
        'code',
        'desc',
        'content',
        'stock',
        'status',
        'slug',
    ];

    public function idCategory()
    {
        return $this->belongsTo(TableCategory::class);
    }

    public function idProduce()
    {
        return $this->belongsTo(TableProduce::class);
    }

    public function idAuthor()
    {
        return $this->belongsTo(TableAuthor::class);
    }
}
