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

    public function update_furniture(Request $request)
    {
        $furniture = Furniture::findOrFail($request->id);


        if ($request->name) {
            $furniture->name = $request->name;
        }

        if ($request->type) {
            $furniture->type = $request->type;
        }

        if ($request->color) {
            $furniture->color = $request->color;
        }

        if ($request->price) {
            $furniture->price = $request->price;
        }

        if ($request->image) {
            $furniture->image = $request->image;
        }

        $furniture->save();

        return redirect()->back()->withSuccess('works');
    }

    public function add_furniture(Request $request)
    {
        $furniture = new Furniture();

        $furniture->name = $request->name;
        $furniture->type = $request->type;
        $furniture->color = $request->color;
        $furniture->price = $request->price;
        $furniture->image = $request->image;

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
}
