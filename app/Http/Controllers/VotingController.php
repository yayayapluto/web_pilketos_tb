<?php

namespace App\Http\Controllers;

use App\Http\Requests\Voting\storeRequest;
use App\Models\Voting;
use App\Responses\Easter;
use App\Responses\SendRedirect;
use Illuminate\Http\Request;

class VotingController extends Controller
{

    public function store(storeRequest $req){
        $data = $req->validated();

        if (!self::checkNISN((string) $req->input("nisn") )) {
            return SendRedirect::withMessage("voting", true, "NISN not registered");
        }

        if (Voting::where("nisn", $data["nisn"])->first()) {
            return SendRedirect::withMessage("voting", true, "NISN already voted");
        }

        $data["voting_id"] = (string) \Str::uuid();

        if (!Voting::create($data)) {
            return SendRedirect::withMessage("voting", false, "Voting failed, please try again later");
        }

        return SendRedirect::withMessage("landing", true, "Voting successfully, thanks!");
    }

    private function checkNISN(string $nisn) {
        $data_nisn = [
            "1234567890",
            "0987654321",
            "1357924680",
            "2468013579",
        ];

        return in_array($nisn, $data_nisn, true);
    }
}
