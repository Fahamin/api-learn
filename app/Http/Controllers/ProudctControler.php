<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProudctControler extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'

        ]);

       return Product:: create($request->all());
    }

    
    public function show($id)
    {
        return Product::find($id);
    }

    //update data 
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product ->update($request->all());
        return $product;
    }

  //delet row by id

    public function destroy($id)
    {
        return Product::destroy($id);
    }

    //search for a name

    public function search($name)
    {
        return Product::where('name' ,'like' ,'%'.$name.'%')->get();
    }
}
