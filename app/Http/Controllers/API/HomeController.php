<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use App\Models\Home;
use App\QueryFilters\BathroomFilter;
use App\QueryFilters\BedroomFilter;
use App\QueryFilters\GarageFilter;
use App\QueryFilters\NameFilter;
use App\QueryFilters\PriceFilter;
use App\QueryFilters\StoreyFilter;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $home = Home::query();
        $homes = app(Pipeline::class)->send($home)
            ->through([
                NameFilter::class,
                PriceFilter::class,
                BedroomFilter::class,
                BathroomFilter::class,
                StoreyFilter::class,
                GarageFilter::class,
            ])
            ->thenReturn()
            ->get();

        return HomeResource::collection($homes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
