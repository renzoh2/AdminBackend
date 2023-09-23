<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Modules\ProductsModule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(Request $request)
    {
        return ProductsModule::getProducts($request);
    }

     /**
     * Display a specific resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showData(int $id)
    {
        return ProductsModule::getProductById($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createData(Request $request)
    {
        return ProductsModule::createProduct($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request, $id)
    {
        return ProductsModule::updateProduct($request, $id);
    }

     /**
     * Delete the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData(int $id)
    {
        return ProductsModule::deleteProduct($id);
    }
}
