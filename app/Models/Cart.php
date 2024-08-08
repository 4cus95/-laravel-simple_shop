<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    public function getTotalSumAttribute() {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->price * $product->pivot->count;
        }

        return $sum;
    }
}
