<?php

namespace App\Http\Controllers;

use App\Http\Requests\Candidate\storeRequest;
use App\Http\Requests\Candidate\updateRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use App\Responses\SendRedirect;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view("candidate.index", compact("candidates"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("candidate.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeRequest $request)
    {
        $data = $request->validated();
        $request->merge(["candidate_id", (string) \Str::uuid()]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('candidateImages', 'public');
        }

        if (!Candidate::create($data)) {
            return SendRedirect::withMessage("candidate.create", false, "Failed to store new data, please try again");
        }

        return SendRedirect::withMessage("candidate.index", true, "Data stored successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        if (!uuid_is_valid($uuid)) {
            return SendRedirect::withMessage("candidate.index", false, "Invalid candidate ID");
        }

        $candidate = Candidate::where('candidate_id', $uuid)->first();
        if (!$candidate) {
            return SendRedirect::withMessage("candidate.index", false, "Candidate not found");
        }

        return view("candidate.show", compact("candidate"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        if (!uuid_is_valid($uuid)) {
            return SendRedirect::withMessage("candidates.index", false, "Invalid candidate ID");
        }

        $candidate = Candidate::where('candidate_id', $uuid)->first();
        if (!$candidate) {
            return SendRedirect::withMessage("candidates.index", false, "Candidate not found");
        }

        return view("candidate.edit", compact("candidate"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRequest $request, string $uuid)
    {
        if (!uuid_is_valid($uuid)) {
            return SendRedirect::withMessage("candidates.index", false, "Invalid candidate ID");
        }

        $candidate = Candidate::where('candidate_id', $uuid)->first();
        if (!$candidate) {
            return SendRedirect::withMessage("candidates.index", false, "Candidate not found");
        }

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('candidateImages', 'public');
        }

        $candidate->update($data);

        return SendRedirect::withMessage("candidates.index", true, "Candidate updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        if (!uuid_is_valid($uuid)) {
            return SendRedirect::withMessage("candidates.index", false, "Invalid candidate ID");
        }

        $candidate = Candidate::where('candidate_id', $uuid)->first();
        if (!$candidate) {
            return SendRedirect::withMessage("candidates.index", false, "Candidate not found");
        }

        $candidate->delete();

        return SendRedirect::withMessage("candidates.index", true, "Candidate deleted successfully");
    }
}
