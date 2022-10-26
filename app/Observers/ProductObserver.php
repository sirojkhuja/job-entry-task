<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductAudit;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        if ($product->isDirty()) {
            if ($product->isDirty('title')) {
                ProductAudit::insert([
                    'changed_field' => 'title',
                    'old_value' => $product->getOriginal('title'),
                    'new_value' => $product->title,
                    'user_id' => Auth::user()->id
                ]);
            }

            if ($product->isDirty('quantity')) {
                ProductAudit::insert([
                    'changed_field' => 'quantity',
                    'old_value' => $product->getOriginal('quantity'),
                    'new_value' => $product->quantity,
                    'user_id' => Auth::user()->id
                ]);
            }

            if ($product->isDirty('price')) {
                ProductAudit::insert([
                    'changed_field' => 'price',
                    'old_value' => $product->getOriginal('price'),
                    'new_value' => $product->price,
                    'user_id' => Auth::user()->id
                ]);
            }
        }
    }
}
