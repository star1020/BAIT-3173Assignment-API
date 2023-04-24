<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\MembershipRepositoryInterface;

class MembershipController extends Controller
{
    private $membershipRepository;

    public function __construct(MembershipRepositoryInterface $membershipRepository)
    {
        $this->membershipRepository = $membershipRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = $this->membershipRepository->allMembership();
        return response()->json(compact('memberships'), 200);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
