<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftRecord extends Model
{
    use HasFactory;

    protected $table = 'free_gifts';

    protected $fillable = [
        'paymentId',
        'giftId',
        'deleted'
    ];

    public function getAllFreeGifts()
    {
        return $this->all();
    }
}
