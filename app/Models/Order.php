<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalSumAttribute() {
        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item->price * $item->count;
        }

        return $sum;
    }
}
