<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Responses\SendRedirect;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    private VotingController $votingController;

    public function __construct(votingController $votingController)
    {
        $this->votingController = $votingController;
    }

    public function landing()
    {
        $candidates = Candidate::all();
        return view("landing", compact("candidates"));
    }

    public function showCandidate(string $uuid)
    {
        $candidate = Candidate::where("candidate_id", $uuid)->first();
        return view("candidate", compact("candidate"));
    }

    public function showVotingForm()
    {
        $votingStatus = $this->votingController->checkVotingTime();

        if ($votingStatus['status'] == "before") {
            return redirect()->route("countdown")->with("datetime", $votingStatus['datetime']);
        } elseif ($votingStatus['status'] == "after") {
            return redirect()->route("deadline")->with("datetime", $votingStatus['datetime']);
        }

        $candidates = Candidate::all();
        return view("voting", compact("candidates"));
    }
}
