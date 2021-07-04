<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function __construct()
    {
        $this->index = 'front.contact_us.index';
        $this->productIndex = 'front.product.index';
    }

    public function index()
    {
        return view($this->index);
    }

    public function productIndex(Request $request)
    {

        $types = ProductType::get();
        if ($request->type_id) {
            $products = Product::where('product_type_id', $request->type_id)->get();
        } else {
            $products = Product::get();
        }
        return view($this->productIndex, compact('products', 'types'));
    }
}
