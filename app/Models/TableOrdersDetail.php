<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableOrdersDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_orders',
        'id_product',
        'price',
        'total_money',
        'quantity',
        'id_user',
    ];

    public function idOrders()
    {
        return $this->belongsTo(TableOrder::class);
    }

    public function idProduct()
    {
        return $this->belongsTo(TableProduct::class);
    }

    public function idUser()
    {
        return $this->belongsTo(TableUser::class);
    }
}
