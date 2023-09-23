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
    public function __invoke(Request $request, Builder $products)
    {
        $pipelines = [
            \App\Pipelines\Products\ByFilter::class,
            \App\Pipelines\Products\BySearch::class,
            \App\Pipelines\Products\ByOrder::class,
            \App\Pipelines\Products\ByPage::class,
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