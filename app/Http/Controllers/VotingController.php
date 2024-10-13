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
            return SendRedirect::withMessage("landing", true, "NISN not valid");
        }

        if (!Voting::create($data)) {
            return SendRedirect::withMessage("landing", false, "Voting failed, please try again later");
        }

        return SendRedirect::withMessage("landing", true, "Vpting successfully, thanks!");
    }

    private function checkNISN(string $nisn) {
        return true;
    }
}
