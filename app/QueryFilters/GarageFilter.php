<?php


namespace App\QueryFilters;


class GarageFilter
{
    public function handle($request, $next)
    {
        $builder = $next($request);

        if (request()->get('storeys')) {
            $builder->where('storeys' , request()->get('storeys'));
        }
        return $builder;
    }
}