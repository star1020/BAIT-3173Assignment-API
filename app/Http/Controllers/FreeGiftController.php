<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreeGift;


class FreeGiftController extends Controller
{
    protected $freeGift;

    public function __construct(FreeGift $freeGift)
    {
        $this->freeGift = $freeGift;
    }

    public function index()
    {
        $freeGifts = (new FreeGift)->getAllFreeGifts();
        return response()->json(compact('freeGifts'), 200);
    }

    public function create()
    {
        return view('free-gifts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gift_name' => 'required',
            'gift_desc' => 'required',
            'gift_image' => 'required',
            'gift_required_price' => 'required',
            'deleted' => 'required'
        ]);

        $this->freeGift->createFreeGift($request->all());

        return redirect()->route('free-gifts.index')
            ->with('success', 'Free gift created successfully.');
    }

    public function edit($id)
    {
        $freeGift = $this->freeGift->findFreeGiftById($id);
        return view('free-gifts.edit', compact('freeGift'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gift_name' => 'required',
            'gift_desc' => 'required',
            'gift_image' => 'required',
            'gift_required_price' => 'required',
            'deleted' => 'required'
        ]);

        $this->freeGift->updateFreeGift($id, $request->all());

        return redirect()->route('free-gifts.index')
            ->with('success', 'Free gift updated successfully');
    }

    public function destroy($id)
    {
        $this->freeGift->deleteFreeGift($id);

        return redirect()->route('free-gifts.index')
            ->with('success', 'Free gift deleted successfully');
    }
    
}
