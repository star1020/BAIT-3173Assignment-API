<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Builders\FreeGiftBuilder;
use App\Builders\FreeGiftBuilderQuery;
use App\Models\FreeGift;

class FreeGiftController extends Controller
{
    protected $freeGiftBuilder;

    public function __construct(FreeGiftBuilder $freeGiftBuilder)
    {
        $this->freeGiftBuilder = $freeGiftBuilder;
    }

    public function index()
    {
        $freeGifts = $this->freeGiftBuilder->get();
        return response()->json(compact('freeGifts'), 200);
    }


    public function store(Request $request)
{
    try {
        $data = [
            'giftName' => $request->giftName,
            'giftDesc' => $request->giftDesc,
            'giftRequiredPrice' => $request->giftRequiredPrice,
            'qty' => $request->qty,
            'image' => $request->giftImages,
            'deleted' => 0
        ];

        $freeGift = $this->freeGiftBuilder->create($data)
            ->save();

        return response()->json(['free_gift' => $freeGift], 200);
    } catch (\Exception $e) {
        // Handle the exception here, such as logging it or returning an error response
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    public function show($id)
    {
        
            $freeGift = $this->freeGiftBuilder->readById($id);
            if ($freeGift) {
                return response()->json(['free_gift' => $freeGift], 200);
            } else {
                return null;
            }
    }
    public function update($id, Request $request)
    {
        try {
            $freeGift = $this->freeGiftBuilder->readById($id)
                ->setGiftName($request->giftName)
                ->setGiftDesc($request->giftDesc)
                ->setGiftRequiredPrice($request->giftRequiredPrice)
                ->setQty($request->qty)
                ->setDeleted($request->deleted)
                ->save();

            if ($request->giftImages != null) {
                $freeGift = $this->freeGiftBuilder->readById($id)
                    ->setGiftImage($request->giftImages)
                    ->save();
            }

            return response()->json(['free_gift' => $freeGift], 200);
        } catch (\Exception $e) {
            // Handle the exception here, such as logging it or returning an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $freeGift = $this->freeGiftBuilder->delete($id);
            return response()->json(['free_gift' => $freeGift], 200);
        } catch (\Exception $e) {
            // Handle the exception here, such as logging it or returning an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function decrease($id)
    {
        try {
            $freeGift = $this->freeGiftBuilder->decrease($id);
            return response()->json(['message' => 'Free gifts updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function increase($id)
    {
        try {
            $freeGift = $this->freeGiftBuilder->increase($id);
            return response()->json(['message' => 'Free gifts updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
