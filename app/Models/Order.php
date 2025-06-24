<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity', 'order_date', 'total'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function orderItems()
    {
    return $this->hasMany(OrderItem::class);
    }
}