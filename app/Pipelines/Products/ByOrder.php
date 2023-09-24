<?php

namespace App\Pipelines\Products;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Closure;

class ByOrder {
    public function __construct(protected Request $request){}

    public function handle(Builder $query, Closure $next){
        return $next($query)
        ->when($this->request->has('sort') && isset($this->request->sort) && $this->request->has('order') && isset($this->request->order), 
        function($query) {
            if($this->request->order == 'desc') 
                $query->orderByDesc($this->request->sort);
            else
                $query->orderBy($this->request->sort);
        });
    }
}
?>