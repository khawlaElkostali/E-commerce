<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function __construct(){
        return $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->paginate(2);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::all();
        return view('product.create',compact('product','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
       $formfields = $request->validated();

       if($request->hasFile('image')){
        $formfields['image'] = $request->file('image')->store('product','public');
       }

       Product::create($formfields);

       return redirect()->route('products.index')->with('success','le produit a bien ete ajouter');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $formfields = $request->validated();

        if($request->hasFile('image')){
         $formfields['image'] = $request->file('image')->store('product','public');
        }

        $product->update($formfields);

        return redirect()->route('products.index')->with('success','le produit a bien ete modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $product->delete();

        return to_route('products.index')->with('success','le produit a bien ete suprimer');
    }
}
