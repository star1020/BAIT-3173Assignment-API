<?php

namespace App\Builders;

interface GiftRecordBuilderQueryInterface
{
    public function get();

    public function findOrFail($id);

    public function create();

    public function setPaymentId($paymentId);

    public function setGiftId($giftId);

    public function setDeleted($deleted);

    public function save();

    public function delete();
}
