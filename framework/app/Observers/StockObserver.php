<?php

namespace App\Observers;

use App\Models\Stock;
use App\Models\Product;

class StockObserver
{
    /**
     * Handle the Stock "created" event.
     */
    public function created(Stock $stock): void
    {
        $product = Product::findOrFail($stock->product_id);
        
        if ($stock->type === 'in') {
            $product->quantity += $stock->quantity;
        } elseif ($stock->type === 'out') {
            $product->quantity = max(0, $product->quantity - $stock->quantity);
        }
        
        $product->save();
    }

    /**
     * Handle the Stock "updated" event.
     */
    public function updated(Stock $stock): void
    {
        $product = Product::findOrFail($stock->product_id);
        $originalStock = $stock->getOriginal();

        // Rollback the old quantity
        if ($originalStock['type'] === 'in') {
            $product->quantity -= $originalStock['quantity'];
        } elseif ($originalStock['type'] === 'out') {
            $product->quantity += $originalStock['quantity'];
        }

        // Apply the new quantity
        if ($stock->type === 'in') {
            $product->quantity += $stock->quantity;
        } elseif ($stock->type === 'out') {
            $product->quantity = max(0, $product->quantity - $stock->quantity);
        }

        $product->save();
    }

    /**
     * Handle the Stock "deleted" event.
     */
    public function deleted(Stock $stock): void
    {
        $product = Product::findOrFail($stock->product_id);
        
        if ($stock->type === 'in') {
            $product->quantity = max(0, $product->quantity - $stock->quantity);
        } elseif ($stock->type === 'out') {
            $product->quantity += $stock->quantity;
        }
        
        $product->save();
    }
}