<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome(){
        $data = Product::paginate(6);
        
        return view('index', [
            'data' => $data
        ]);
    }

    public function search(Request $req){
        $name = $req->input('search');
        $data = Product::where('name','like', '%'.$name.'%')->paginate(6);

        return view('products.search')->with('data', $data);
    }
}
