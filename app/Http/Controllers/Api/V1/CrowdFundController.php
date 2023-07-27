<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CrowdFund;
use App\Http\Requests\StoreCrowdFundRequest;
use App\Http\Requests\UpdateCrowdFundRequest;
use App\Http\Resources\V1\CrowdFundCollection;

class CrowdFundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return new CrowdFundCollection(CrowdFund::all());
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
    public function store(StoreCrowdFundRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CrowdFund $crowdFund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CrowdFund $crowdFund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCrowdFundRequest $request, CrowdFund $crowdFund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CrowdFund $crowdFund)
    {
        //
    }
}
