<?php

namespace App\Builders;

use App\Models\FreeGift;

class FreeGiftBuilder
{
    protected $query;

    public function __construct(FreeGiftBuilderQuery $query)
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
        return FreeGift::create($data);
    }
    
    public function save()
    {
        $this->query->save();
        return $this;
    }

    public function delete()
    {
        $freeGift = freeGift::findOrFail($id);
        $freeGift->deleted = 1;
        $freeGift->update();
    }

    public function update($id, $data)
    {
        $gift = FreeGift::findOrFail($id);
        $gift->update($data);
    }
}