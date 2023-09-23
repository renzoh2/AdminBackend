<?php

namespace App\Pipelines\Products;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Closure;

class BySearch {
    public function __construct(public Request $request){}

    public function handle(Builder $query, Closure $next){
        return $next($query)
        ->when($this->request->has('search') && !empty($this->request->search), 
        fn($query) => $query->where(
            function($q){
                $q->orWhere('description', 'regexp', $this->request->search);
                $q->orWhere('name', 'regexp', $this->request->search);
            }
        ));
    }
}

?>