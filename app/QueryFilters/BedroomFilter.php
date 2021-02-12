<?php


namespace App\QueryFilters;


class BedroomFilter
{
    public function handle($request, $next)
    {
        $builder = $next($request);

        if (request()->get('bedrooms')) {
            $builder->where('bedrooms' , request()->get('bedrooms'));
        }
        return $builder;
    }
}