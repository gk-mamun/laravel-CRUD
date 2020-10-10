<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // Read function
    public function index() {

        $items = Item::all();
        $numItem = Item::all()->count();
        
        return view('items.index', [
            'items' => $items,
            'numItems' => $numItem
        ]);
    }

    public function create() {
        return view('items.create');
    }

    public function edit($id) {
        // Get a single record
        $item = Item::findOrFail($id);

        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, $id) {
        
        $item = Item::find($id);

        $item->name = request('name');
        $item->code = request('code');
        $item->price = request('price');
        $item->stock = request('stock');

        if($request->hasfile('item_image')) {
            // File name with extension
            $filenameWithExt = $request->file('item_image')->getClientOriginalName();

            // Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            // Get file extension
            $extension = $request->file('item_image')->getClientOriginalExtension();

            // Create new filename
            $finalFilename = $filename.'_'.time().'.'.$extension;

            // Upload image
            $path = $request->file('item_image')->storeAs('/public/item_images', $finalFilename);

            $item->image = $finalFilename;
        }

        $item->save();

        return redirect('/items')->with('message', 'Item has been update');

    }

    public function store(Request $request) {
        
        // Validate the inputs
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
            'item_image' => 'image|max:1999',
            'stock' => 'required'
        ]);
        
        // File name with extension
        $filenameWithExt = $request->file('item_image')->getClientOriginalName();

        // Get just file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        // Get file extension
        $extension = $request->file('item_image')->getClientOriginalExtension();

        // Create new filename
        $finalFilename = $filename.'_'.time().'.'.$extension;

        // Upload image
        $path = $request->file('item_image')->storeAs('/public/item_images', $finalFilename);

        // Insert items into database
        $item = New Item();
        
        
        $item->name = request('name');
        $item->code = request('code');
        $item->price = request('price');
        $item->image = $finalFilename;
        $item->stock = request('stock');

        $item->save();

        return redirect('/items')->with('message', 'New item has been added');

    }

    public function show($id) {
        // Get a single record
        $item = Item::findOrFail($id);

        // show the item in show view
        return view('items.show', ['item' => $item]);
    }

    public function delete($id) {
        // Find the row with passed id
        $item = Item::find($id);

        // Delete the row
        $item->delete();

        // Redirect to items page
        return redirect('/items')->with('message', 'Item has been delete');

    }

}
