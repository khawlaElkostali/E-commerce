<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
   public function home(Request $request){

    $categories = Category::query()->has('products')->get();
    $productsQuery = Product::query();

    $name = $request->input('name');
    $categoryIds = $request->input('categories');
    $min = $request->input('min');
    $max = $request->input('max');
    $minPrix = $productsQuery->min('prix');
    $maxPrix = $productsQuery->max('prix');

   // dd($minPrix);
    // dd($maxPrix);
   // dd($categoryIds);
    
    if($name){
        $productsQuery->where('name','like',"%$name%");
    }

    if($categoryIds){
        $productsQuery->whereIn('category_id',$categoryIds);
    }

    if($min){
        $productsQuery->where('prix','>=',$min);
    }

    if($max){
        $productsQuery->where('prix','<=',$max);
    }
    

    $products = $productsQuery->get();
    
    return view('product.home',compact('products','categories','minPrix','maxPrix'));
   }
}
