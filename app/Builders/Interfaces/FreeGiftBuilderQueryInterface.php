<?php

namespace App\Builders\Interfaces;

interface FreeGiftBuilderQueryInterface
{
    public function get();

    public function findOrFail($id);

    public function create();

    public function setGiftName($giftName);

    public function setGiftDesc($giftDesc);

    public function setGiftImage($image);

    public function setGiftRequiredPrice($giftRequiredPrice);

    public function setQty($qty);

    public function setDeleted($deleted);

    public function save();

    public function delete();
}
