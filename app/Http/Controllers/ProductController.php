<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductHelperService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, ProductHelperService $helper)
    {
        $validated = $request->validated();

        // Create a new product with the data in validated request
        $product = Product::create($validated);

        // Calculate price with VAT
        $product->price_with_vat = $helper->calculateTotalWithVAT($product, config('product.VAT'));

        // Save the changes to database
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product, ProductHelperService $helper)
    {
        $validated = $request->validated();

        // Update with the data in validated request
        $product = $product->fill($validated);

        // Recalculate price with VAT
        $product->price_with_vat = $helper->calculateTotalWithVAT($product, config('product.VAT'));

        // Save the changes to database
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product) {
            $product->delete();
        }

        return redirect()->route('products.index');
    }
}
