<?php

namespace App\Pipelines\Products;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Closure;

class ByFilter {
    public function __construct(protected Request $request){}

    public function handle(Builder $query, Closure $next){
        return $next($query)
        ->when($this->request->has('filter') && !empty($this->request->filter), 
        fn($query) => $query->where(
            function($q) {
                $q->where('category', '=', $this->request->filter);
            }
        ));
    }
}

?>