<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::latest()->paginate(5);

        return view('products.index', compact('products'))->with(request()->input('page'));//compact is a php function that creates an array of given variable value
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the input
            $request->validate([
                'name'=>'required',
                'detail'=>'required'
            ]);

        //create new product in the database
            product::create($request->all());

        //redirect the user and send friendly message
            return redirect()->route('products.index')->with('success','product created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $item = product::find($product);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //validate the input
        $request->validate([
            'name'=>'required',
            'detail'=>'required'
        ]);

    //create new product in the database
        $product->update($request->all());

    //redirect the user and send friendly message
        return redirect()->route('products.index')->with('success','product created sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //delete the product from the database
        $product->delete();

        //redirect the user and display success message
        return redirect()->route('products.index')->with('success','product ' . $product->id. ' deleted sucessfully');
    }
}
