<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy("id","desc")->paginate(10);
        return response()->json($products);

    }

    public function show(Product $product){
        return response()->json($product ,200);
    }

    public function store(ProductRequest $request){
        $inputs = $request->validated();
        if($request->hasFile('image')){
            $inputs['thumbnail'] = $request->image->store('storage/products-images');
        }
        $product = Product::create($inputs);
        return response()->json($product ,200);
    }
    public function update(ProductRequest $request, Product $product){
        $inputs = $request->validated();
        if($request->hasFile('image')){
            $inputs['thumbnail'] = $request->image->store('storage/products-images');
        }
        $product->update($request->validated());
        return response()->json($product ,201);

    }
    public function destory(Product $product){
        $product->delete();
        return response()->json($product ,204);
    }
}
