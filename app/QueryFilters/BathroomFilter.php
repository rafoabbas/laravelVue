<?php


namespace App\QueryFilters;


class BathroomFilter
{
    public function handle($request, $next)
    {
        $builder = $next($request);

        if (request()->get('bathrooms')) {
            $builder->where('bathrooms' , request()->get('bathrooms'));
        }
        return $builder;
    }
}