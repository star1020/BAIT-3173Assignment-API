<?php 
namespace App\Builders;
use App\Builders\Interfaces\FreeGiftBuilderQueryInterface;
use App\Models\FreeGift;

class FreeGiftBuilderQuery implements FreeGiftBuilderQueryInterface
{
    protected $query;

    public function __construct()
    {
        $this->query = new FreeGift();
    }

    public function get()
    {
        return $this->query->where('deleted', 0)->get();
    }
    public function findOrFail($id)
    {
        $model= $this->query->find($id);
        if($model){
            return $model;
        }
        return null;
    }

    public function create()
    {
        $this->query = new FreeGift();
        return $this;
    }
    
    public function setGiftName($giftName)
    {
        $this->query->giftName = $giftName;
        return $this;
    }

    public function setGiftDesc($giftDesc)
    {
        $this->query->giftDesc = $giftDesc;
        return $this;
    }
    public function setGiftImage($image)
    {
        $this->query->image = $image;
        return $this;
    }
    public function setGiftRequiredPrice($giftRequiredPrice)
    {
        $this->query->giftRequiredPrice = $giftRequiredPrice;
        return $this;
    }
    public function setQty($qty)
    {
        $this->query->qty = $qty;
        return $this;
    }
    public function setDeleted($deleted)
    {
        $this->query->deleted = $deleted;
        return $this;
    }

    public function save()
    {
        $this->query->save();
        return $this;
    }

    public function delete()
    {
        $this->query->delete();
        return $this;
    }
}