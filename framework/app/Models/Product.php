<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'quality',
        'origin',
        'description',
        'quantity',
        
    ];

    // Relasi dengan model Stock (opsional, jika ingin melihat histori stok)
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
