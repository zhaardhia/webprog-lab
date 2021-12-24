<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{

    public function add_furniture(Request $request) //tujuannya untuk add furniture ke DB
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

        return view('/admin/add-item');

        // return redirect('/add-item');
    }
}
