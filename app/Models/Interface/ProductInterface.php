<?php

namespace App\Models\Interface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

interface ProductInterface{

    public static function getAllProducts();

    public static function filterAllProducts(Request $request, Builder $products);

    public static function getProductById(int $id);

    public static function saveProduct(array $request);

    public static function updateProduct(array $request, int $id);

    public static function deleteProduct(int $id);
}

?>