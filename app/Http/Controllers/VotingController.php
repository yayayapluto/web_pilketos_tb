<?php

namespace App\Http\Controllers;

use App\Http\Requests\Voting\storeRequest;
use App\Models\Voting;
use App\Responses\SendRedirect;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function store(storeRequest $req){
        $data = $req->validated();

        if (!self::checkNISN("1099999999")) {
            return SendRedirect::withMessage("voting", true, "NISN not valid");
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
        return true;
    }
}
