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

    public function create()
    {
        return view('free-gifts.create');
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
        try {
            $freeGift = $this->freeGiftBuilder->readById($id);
            if ($freeGift) {
                return response()->json(['free_gift' => $freeGift], 200);
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
            $freeGift = $this->freeGiftBuilder->readById($id)
            ->setDeleted(1)
            ->save();
            return response()->json(['free_gift' => $freeGift], 200);
        } catch (\Exception $e) {
            // Handle the exception here, such as logging it or returning an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
