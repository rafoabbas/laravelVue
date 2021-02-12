<?php


namespace App\QueryFilters;


class PriceFilter
{
    public function handle($request, $next)
    {
        $builder = $next($request);

        if (request()->get('price_one')) {
            $builder->where('price' , '>', request()->get('price_one'));
        }
        if (request()->get('price_two')) {
            $builder->where('price' , '<', request()->get('price_two'));
        }
        return $builder;
    }
}