<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeGift extends Model
{
    use HasFactory;

    protected $table = 'free_gifts';

    protected $fillable = [
        'giftName',
        'giftDesc',
        'giftRequiredPrice',
        'qty',
        'image',
        'deleted'
    ];

    public function setGiftName($giftName)
    {
        $this->attributes['giftName'] = $giftName;
        return $this;
    }
    public function setGiftDesc($giftDesc)
    {
        $this->attributes['giftDesc'] = $giftDesc;
        return $this;
    }

    public function setGiftRequiredPrice($giftRequiredPrice)
    {
        $this->attributes['giftRequiredPrice'] = $giftRequiredPrice;
        return $this;
    }

    public function setQty($qty)
    {
        $this->attributes['qty'] = $qty;
        return $this;
    }

    public function setDeleted($deleted)
    {
        $this->attributes['deleted'] = $deleted;
        return $this;
    }
    public function setGiftImage($giftImage)
    {
        $this->attributes['image'] = $giftImage;
        return $this;
    }

    public function getAllFreeGifts()
    {
        return $this->all();
    }
}
