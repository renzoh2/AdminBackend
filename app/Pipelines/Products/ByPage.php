<?php

namespace App\Pipelines\Products;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Closure;

class ByPage {
    public function __construct(protected Request $request){}

    public function handle(Builder $query, Closure $next){
        return $next($query)
        ->when(
            $this->request->has('page') && !empty($this->request->page) && 
            $this->request->has('limit') && !empty($this->request->limit), 
        function($query) {
            $skip = ((int) $this->request->page - 1) * (int) $this->request->limit;
            $query->skip($skip)->take($this->request->limit);
        });
    }
}

?>