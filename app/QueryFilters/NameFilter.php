<?php


namespace App\QueryFilters;


class NameFilter
{
    public function handle($request, $next)
    {
        $builder = $next($request);

        if (request()->get('name')) {
            $builder->where('name' , 'like', '%'.request()->get('name').'%');
        }

        return $builder;
    }
}