<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate();

        return view("site.products.index", compact("products"));
    }

    public function show(Product $product)
    {

        return view("site.products.show", compact("product"));
    }

}
