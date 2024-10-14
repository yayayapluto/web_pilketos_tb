<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function landing() {
        $candidates = Candidate::all();
        return view("landing", compact("candidates"));
    }

    public function showCandidate(string $uuid) {
        $candidate = Candidate::where("candidate_id", $uuid)->first();
        return view("candidate", compact("candidate"));
    }

    public function showVotingForm() {
        $candidates = Candidate::all();
        return view("voting", compact("candidates"));
    }
}
