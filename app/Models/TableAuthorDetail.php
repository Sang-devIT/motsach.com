<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableAuthorDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'authour_id',
        'product_id',
    ];

    public function authour()
    {
        return $this->belongsTo(TableAuthor::class);
    }

    public function product()
    {
        return $this->belongsTo(TableProduct::class);
    }
}
