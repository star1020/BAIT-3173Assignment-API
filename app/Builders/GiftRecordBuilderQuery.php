<?php 
namespace App\Builders;
use App\Builders\Interfaces\GiftRecordBuilderQueryInterface;
use App\Models\GiftRecord;

class GiftRecordBuilderQuery implements GiftRecordBuilderQueryInterface
{
    protected $query;

    public function __construct()
    {
        $this->query = new GiftRecord();
    }

    public function get()
    {
        return $this->query->where('deleted', 0)->get();
    }
    public function findOrFail($id)
    {
        return $this->query->findOrFail($id);
    }

    public function create()
    {
        $this->query = new GiftRecord();
        return $this;
    }
    
    public function setPaymentId($paymentId)
    {
        $this->query->paymentId = $paymentId;
        return $this;
    }

    public function setGiftId($giftId)
    {
        $this->query->giftId = $giftId;
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