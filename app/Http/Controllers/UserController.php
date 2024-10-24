<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Voting;
use App\Responses\SendRedirect;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showDashboardPage() {
        if (!Auth::check()) {
            return SendRedirect::withMessage("login", false, "Belum terautentikasi, login dulu");
        }
        
        $voteStatusLabel = ["Sudah", "Belum"];
        $votedCount = Voting::all()->count();
        $voteStatusData = [$votedCount, 100 - $votedCount];

        $candidates = Candidate::withCount('votings')->get(); //voitngs_count
        $candidateVoteLabel = $candidates->pluck('name')->toArray();
        $candidateVoteData = $candidates->pluck('votings_count')->toArray();

        return view("admin.dashboard", compact(
            "voteStatusLabel",
            "voteStatusData",
            "candidateVoteLabel",
            "candidateVoteData"
        ));
    }

    public function showMonitorPage() {
        if (!Auth::check()) {
            return SendRedirect::withMessage("login", false, "Belum terautentikasi, login dulu");
        }

        $voteByPeriodLabel = ["1 Hours", "6 Hours", "12 Hours", "Day", "Week"];
        $voteByPeriodData = [];
        $periods = [
            1 => now()->subHours(1),
            6 => now()->subHours(6),
            12 => now()->subHours(12),
            24 => now()->subDays(1),
            168 => now()->subDays(7),
        ];
        foreach ($periods as $label => $time) {
            $voteCount = Voting::where('created_at', '>=', $time)->count();
            $voteByPeriodData[] = $voteCount;
        }

        $transactionLabel = ["NISN", "Nama", "Kelas" ,"Kandidat", "Waktu"];
        $transactionData = [];
        $votings = Voting::with('candidate')->get();
        foreach ($votings as $voting) {
            $transactionData[] = [
                'nisn' => $voting->nisn,
                'name' => $voting->name ?? "Entitas",
                'class' => $voting->class ?? "",
                'candidate' => $voting->candidate->name ?? "[Kandidat Dihapus]",
                'time' => $voting->created_at->format('Y-m-d H:i:s'),
            ];
        }

        return view("admin.monitor", compact(
            "voteByPeriodLabel",
            "voteByPeriodData",
            "transactionLabel",
            "transactionData"
        ));
    }
}
