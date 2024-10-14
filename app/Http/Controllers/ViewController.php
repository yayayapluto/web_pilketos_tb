<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function landing() {
        $candidates = Candidate::all()->except(['created_by', 'updated_by', 'deleted_by']);
        return view("welcome", compact("candidates"));
    }

    public function showVotingForm() {
        $candidates = Candidate::all()->except(['created_by', 'updated_by', 'deleted_by']);
        return view("voting.store", compact("candidates"));
    }
}
