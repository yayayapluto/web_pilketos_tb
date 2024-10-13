<?php

namespace App\Http\Controllers;

use App\Responses\SendRedirect;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showDashboardPage() {
        if (!Auth::check()) {
            return SendRedirect::withMessage("login", false, "Not authenticated");
        }
        
        $voteStatusLabel = ["Sudah", "Belum"];
        $voteStatusData = [];

        $candidateVoteLabel = ["Sudah", "Belum"];
        $candidateVoteData = [];

        return view("admin.dashboard", compact(
            "voteStatusLabel",
            "voteStatusData",
            "candidateVoteLabel",
            "candidateVoteData"
        ));
    }

    public function showMonitorPage() {
        if (!Auth::check()) {
            return SendRedirect::withMessage("login", false, "Not authenticated");
        }

        $voteByPeriodLabel = ["1 Hours", "6 Hours", "12 Hours", "Day", "Week"];
        $voteByPeriodData = [];

        $transactionLabel = ["NISN", "Kandidat", "Waktu"];
        $transactionData = [];

        return view("admin.monitor", compact(
            "voteByPeriodLabel",
            "voteByPeriodData",
            "transactionLabel",
            "transactionData"
        ));
    }
}
