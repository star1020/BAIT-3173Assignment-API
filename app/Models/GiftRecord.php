<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftRecord extends Model
{
    use HasFactory;

    protected $table = 'gift_record';

    protected $fillable = [
        'paymentId',
        'giftId',
        'deleted'
    ];
    public function setPaymentId($paymentId)
    {
        $this->attributes['paymentId'] = $paymentId;
        return $this;
    }
    public function setGiftId($giftId)
    {
        $this->attributes['giftId'] = $giftId;
        return $this;
    }
    public function getAllFreeGifts()
    {
        return $this->all();
    }
}
