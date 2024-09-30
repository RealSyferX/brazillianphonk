<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricalPurchase extends Model
{
    protected $table = 'historical_purchase';

    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'price', 'total', 'purchase_date',
    ];

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
