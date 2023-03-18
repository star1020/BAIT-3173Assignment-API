<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Builders\GiftRecordBuilder;
use App\Builders\GiftRecordBuilderQuery;
use App\Models\GiftRecord;

class GiftRecordController extends Controller
{
    protected $giftRecordBuilder;

    public function __construct(GiftRecordBuilder $giftRecordBuilder)
    {
        $this->giftRecordBuilder = $giftRecordBuilder;
    }

    public function index()
    {
        $giftRecords = $this->giftRecordBuilder->get();
        return response()->json(compact('giftRecords'), 200);
    }

    public function create()
    {
        return view('gift-records.create');
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'paymentId' => $request->paymentId,
                'giftId' => $request->giftId,
                'deleted' => 0
            ];

            $giftRecord = $this->giftRecordBuilder->create($data)
                ->save();

            return response()->json(['gift_record' => $giftRecord], 200);
        } catch (\Exception $e) {
            // Handle the exception here, such as logging it or returning an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function show($id)
    {
        try {
            $giftRecord = $this->giftRecordBuilder->readById($id);
            if ($giftRecord) {
                return response()->json(['gift_record' => $giftRecord], 200);
            } else {
                return response()->json(['error' => 'Free gift not found'], 404);
            }
        } catch (\Exception $e) {
            // Handle the exception here, such as logging it or returning an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function update($id, Request $request)
    {
        try {
            $giftRecord = $this->giftRecordBuilder->readById($id)
                ->setPaymentId($request->paymentId)
                ->setGiftId($request->giftId)
                ->save();

            return response()->json(['gift_record' => $giftRecord], 200);
        } catch (\Exception $e) {
            // Handle the exception here, such as logging it or returning an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $giftRecord = $this->giftRecordBuilder->delete($id);
            return response()->json(['gift_record' => $giftRecord], 200);
        } catch (\Exception $e) {
            // Handle the exception here, such as logging it or returning an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function checkPaymentId($paymentId)
    {
        $giftRecord = GiftRecord::where('paymentId', $paymentId)->first();
        $countGiftRecord = GiftRecord::where('paymentId', $paymentId)->count();
        if ($giftRecord && $countGiftRecord==1) {
            return response()->json(['gift_record' => $giftRecord], 200);
        } else {
            return null;
        }
    }



}
