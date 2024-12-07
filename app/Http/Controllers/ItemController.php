<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function get()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $item = new Item;
        $item-> name = $request->name;
        $item-> description = $request->description;
        $item->price = $request->price;
        $item->save();
        return response()->json([
            'message' => 'Item Added'
        ], 201);

    }


}

