<?php


namespace App\QueryFilters;


class StoreyFilter
{
    public function handle($request, $next)
    {
        $builder = $next($request);

        if (request()->get('garages')) {
            $builder->where('garages' , request()->get('garages'));
        }
        return $builder;
    }
}