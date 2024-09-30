<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'carts';

    // Specify the fields that are mass assignable
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Optionally, you can use $guarded instead of $fillable
    // protected $guarded = [];

    /**
     * Relationship with User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
