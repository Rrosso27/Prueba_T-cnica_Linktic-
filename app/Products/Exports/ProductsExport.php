<?php

namespace App\Products\Exports;
use App\Products\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
class ProductsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::all();
    }
}
