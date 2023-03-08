<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeGift extends Model
{
    use HasFactory;

    protected $table = 'free_gifts';

    protected $fillable = [
        'gift_name',
        'gift_desc',
        'gift_image',
        'gift_required_price',
        'deleted'
    ];

    public function getAllFreeGifts()
    {
        return $this->all();
    }
}
