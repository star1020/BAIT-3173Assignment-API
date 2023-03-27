<?php

namespace App\Builders;
use App\Builders\Interfaces\FreeGiftBuilderInterface;
use App\Models\FreeGift;

class FreeGiftBuilder implements FreeGiftBuilderInterface
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

    public function delete($id)
    {
        $freeGift = freeGift::findOrFail($id);
        $freeGift->deleted = 1;
        $freeGift->update();
    }

    public function decrease($id)
    {
        $freeGift = freeGift::findOrFail($id);
        $freeGift->qty -= 1;
        $freeGift->update();
    }
    public function increase($id)
    {
        $freeGift = freeGift::findOrFail($id);
        $freeGift->qty += 1;
        $freeGift->update();
    }

    public function update($id, $data)
    {
        $gift = FreeGift::findOrFail($id);
        $gift->update($data);
    }
}