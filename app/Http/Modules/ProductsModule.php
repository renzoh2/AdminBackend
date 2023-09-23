<?php

namespace App\Http\Modules;

use Illuminate\Http\Request;
use App\Models\ResourceModel\ProductsResource;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Support\Facades\Config;
use App\Http\Helper\FileHandler;
use App\Models\DataModel\Products;

class ProductsModule {
    
    public static function getProducts(Request $request)
    {
        //Defining Defaults
        if(empty($request->page)) $request['page'] = 1;
        if(empty($request->limit)) $request['limit'] = 10;
        if(empty($request->sort)) $request['sort'] = 'id';
        if(empty($request->order)) $request['order'] = 'asc';

        $allData = ProductsResource::getAllProducts();
        $recordData = $allData->get(); //Get all Products

        //Filter Products
        $data = ProductsResource::filterAllProducts($request, $allData);
        
        $count = isset($data) ? count($data) : 0;
        $records = isset($recordData) ? count($recordData) : 0;

        return ResponseBuilder::response(
            http_response_code(),
            Config::get('constants.status.success'),
           [
            'records' => $records,
            'count' => $count,
            'data' => $data
           ]);
    }

    public static function getProductById(int $id)
    {
        $data = ProductsResource::getProductById($id);

        return ResponseBuilder::response(
            http_response_code(),
            Config::get('constants.status.success'),
           [
            'data' => $data
           ]);
    }

    public static function createProduct(Request $request)
    {
        //Preparing Filename
        $fileNames = FileHandler::prepareFileName($request->file('image'));

        $products = new Products(
            $request['name'],
            $request['description'],
            $request['category'],
            json_encode($fileNames),
            $request['dateTimeCreated']
        );

        $status = ProductsResource::saveProduct($products->toArray());

        if($status)
        {
            FileHandler::fileUpload($request->file('image'), $fileNames);
        }

        return self::buildResponse(
            $status, 
            Config::get('constants.products.create.title'),  
            Config::get('constants.products.create.message'));

    }

    public static function updateProduct(Request $request, $id)
    {
        //Preparing Filename
        $fileNames = FileHandler::prepareFileName($request->file('image'));

        $products = new Products(
            $request['name'],
            $request['description'],
            $request['category'],
            json_encode($fileNames),
            $request['dateTimeCreated']
        );

        $filteredArray = array_filter($products->toArray());

        $status = ProductsResource::updateProduct($filteredArray, $id);

        if($status)
        {
            FileHandler::fileUpload($request->file('image'), $fileNames);
        }

        return self::buildResponse(
            $status, 
            Config::get('constants.products.update.title'),  
            Config::get('constants.products.update.message'));
 
    }

    public static function deleteProduct(int $id)
    {
        $status = ProductsResource::deleteProduct($id);

        return self::buildResponse(
            $status,
            Config::get('constants.products.delete.title'),  
            Config::get('constants.products.delete.message')); 
    }

    private static function buildResponse($status, $title, $message)
    {
        if($status)
        {
            return ResponseBuilder::response(
                http_response_code(),
                Config::get('constants.status.success'),
               [
                'title' => $title,
                'message' => $message, 
               ]);
        }
        else
        {
            return ResponseBuilder::response(
                http_response_code(),
                Config::get('constants.status.fail'),
               [
                'title' =>  Config::get('constants.processFail.title'),
                'message' => Config::get('constants.processFail.message'), 
               ]);
        } 
    }
}


?>