<?php

namespace App\Pipelines;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ProductPipeline
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Builder $products, $ByPage = true)
    {
        if($ByPage == true)
            $pipelines = [
                \App\Pipelines\Products\ByFilter::class,
                \App\Pipelines\Products\BySearch::class,
                \App\Pipelines\Products\ByOrder::class,
                \App\Pipelines\Products\ByPage::class,
            ];
        else
            $pipelines = [
                \App\Pipelines\Products\ByFilter::class,
                \App\Pipelines\Products\BySearch::class,
                \App\Pipelines\Products\ByOrder::class,
            ];

        //$query = Products::query();
        $products = app(Pipeline::class)
        ->send($products)
        ->through($pipelines)
        ->thenReturn()
        ->get();

        return $products;
    }
}