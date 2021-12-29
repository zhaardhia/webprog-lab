<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{

    public function getFurniture($furniture_id)
    {
        $furniture = Furniture::where('id', '=', $furniture_id)->get();
        return view('/admin/update-item', ['furniture' => $furniture[0]]);
    }

    public function update_furniture(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:15',
            'type' => 'required',
            'color' => 'required',
            'price' => 'required|integer|between:5000,10000000',
        ]);

        $furniture = Furniture::findOrFail($id);


        $furniture->name = $request->name;
        $furniture->type = $request->type;
        $furniture->color = $request->color;
        $furniture->price = $request->price;

        if ($request->has('file')) {
            $request->validate([
                'file' => 'mimes:jpeg,png',
            ]);
            $request->file->store('product', 'public');
            $furniture->image = $request->file->hashName();
        }

        $furniture->save();

        return redirect()->back()->withSuccess('works');
    }

    public function add_furniture(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:furniture|max:15',
            'type' => 'required',
            'color' => 'required',
            'price' => 'required|integer|between:5000,10000000',
            'file' => 'required|mimes:jpeg,png',
        ]);

        $request->file->store('product', 'public');

        $furniture = new Furniture();

        $furniture->name = $request->name;
        $furniture->type = $request->type;
        $furniture->color = $request->color;
        $furniture->price = $request->price;
        $furniture->image = $request->file->hashName();

        $query = $furniture->save();

        if ($query) {
            echo 'success';
        } else {
            echo 'failed';
        }

        return redirect()->back()->withSuccess('IT WORKS!');
    }

    public function index()
    {
        $furnitures = Furniture::all();
        return view('index', ['furnitures' => $furnitures]);
    }

    public function view()
    {
        $furnitures = Furniture::all();
        return view('view', ['furnitures' => $furnitures]);
    }

    public function deleteFurniture(Request $request)
    {
        // echo $request->furniture_id;
        $furniture = Furniture::findOrFail($request->furniture_id);
        // $furniture->detail->delete();
        // $furniture->images->delete();
        $furniture->delete();

        return redirect()->to('/');
    }
    public function goToDetail($furniturename)
    {
        $furniture = Furniture::where('name', '=', $furniturename)->get();
        $furnitures = Furniture::all();
        return view('details', ['furniture' => $furniture[0]])->with('furnitures', $furnitures);
    }
}
