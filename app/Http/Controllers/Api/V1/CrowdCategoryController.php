<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\CrowdFundController;
use App\Models\CrowdCategory;
use App\Http\Requests\StoreCrowdCategoryRequest;
use App\Http\Requests\UpdateCrowdCategoryRequest;
use App\Models\CrowdFund;

class CrowdCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCrowdCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CrowdCategory $crowdCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CrowdCategory $crowdCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCrowdCategoryRequest $request, CrowdCategory $crowdCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CrowdCategory $crowdCategory)
    {
        //
    }
}
