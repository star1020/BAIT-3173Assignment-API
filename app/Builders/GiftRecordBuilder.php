<?php

namespace App\Builders;

use App\Models\GiftRecord;

class GiftRecordBuilder implements GiftRecordBuilderInterface
{
    protected $query;

    public function __construct(GiftRecordBuilderQuery $query)
    {
        $this->query = $query;
    }

    public function get()
    {
        return $this->query->get();
    }

    public function readById($id)
    {
        return $this->query->findOrFail($id);
    }

    public function create($data)
    {
        return GiftRecord::create($data);
    }
    
    public function save()
    {
        $this->query->save();
        return $this;
    }

    public function delete($id)
    {
        $giftRecord = GiftRecord::findOrFail($id);
        $giftRecord->deleted = 1;
        $giftRecord->update();
    }

    public function update($id, $data)
    {
        $gift = GiftRecord::findOrFail($id);
        $gift->update($data);
    }
}