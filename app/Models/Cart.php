<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public static function totalItems($userId = null)
    {
    $userId = $userId ?? auth()->id();
    if (!$userId) return 0;
    $cart = self::where('user_id', $userId)->first();
    if (!$cart) return 0;
    return $cart->cartItems()->sum('quantity');
    }
}
