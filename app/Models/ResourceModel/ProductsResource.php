<?php

namespace App\Models\ResourceModel;

use App\Models\Interface\ProductInterface;
use App\Models\Products;
use App\Pipelines\ProductPipeline;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Throwable;

class ProductsResource implements ProductInterface {

    public static function getAllProducts()
    {
        try{
            return Products::query();
        }
        catch(Throwable $e)
        {
            report($e);
            return false;
        }
    }

    public static function filterAllProducts(Request $request, Builder $products)
    {
        try{
            $pipeline = new ProductPipeline();
            $products = $pipeline->__invoke($request, $products);
    
            return $products;
        }
        catch(Throwable $e)
        {
            report($e);
            return false;
        }
    }

    public static function getProductById(int $id)
    {
        try{
            return Products::where("id", $id)->first();
        }
        catch(Throwable $e)
        {
            report($e);
            return false;
        }
    }

    public static function saveProduct(array $request)
    {
        try{
            return Products::create($request);
        }
        catch(Throwable $e)
        {
            report($e);
            return false;
        }
    }

    public static function updateProduct(array $request, int $id)
    {
        try{
            Products::where('id', $id)->update($request);
            return self::getProductById($id);
        }
        catch(Throwable $e)
        {
            report($e);
            return false;
        }
    }

    public static function deleteProduct(int $id)
    { 
        try{
            return  Products::where('id', $id)->delete();
        }
        catch(Throwable $e)
        {
            report($e);
            return false;
        }
    }
}


?>