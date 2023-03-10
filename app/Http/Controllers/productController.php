<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return response()->json([
            "message"=>"liste de tout les produits",
            "data"=>$products
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
          [  "name"=>"required",
            "description"=>"required"
          ]
        );
      
        $product = Product::create($request->all());
        return response()->json([
            "message"=>"new product is",
            "data"=>$product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json([
                "message"=>"Product not found",
            ],404);
        }else{
            return response()->json([
                "message"=>"Product find",
                "data"=>$product
            ],200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(["message" => "Product not found"],404);
        }
        $product->update($request->all());
        return response()->json(
            [
                "message" => "Product updated",
                "data"=>$product
            ]
            ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $productCopy = $product;
        if(is_null($product)){
            return response()->json(["message" => "Product not found"],404);
        }
        $product->delete();
        return response(
            [
                "message" => "Product deleted",
                "delete"=>$productCopy
                
            ],
       200 );
    }

    public function find(Request $request){
        //
        $products = Product::all()->where('name',$request->name)
                                  ->where('id',2);
       
        return response()->json([
            "message" => "Product liste",
            "data" => $products
        ],200);
    }
}
