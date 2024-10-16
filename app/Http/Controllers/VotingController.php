<?php

namespace App\Http\Controllers;

use App\Http\Requests\Voting\storeRequest;
use App\Models\Voting;
use App\Responses\Easter;
use App\Responses\SendRedirect;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class VotingController extends Controller
{

    public function store(storeRequest $req){
        $data = $req->validated();
        $resData = self::checkNISN((string) $req->input("nisn") );

        if (!$resData) {
            return SendRedirect::withMessage("voting", true, "NISN not registered");
        }

        $studentsData = $resData["data"];

        if (Voting::where("nisn", $data["nisn"])->first()) {
            return SendRedirect::withMessage("voting", false, "NISN already voted");
        }

        $data["voting_id"] = (string) \Str::uuid();
        $data["name"] = $studentsData["nama_siswa"];
        $data["class"] = $studentsData["id_kelas"];

        if (!Voting::create($data)) {
            return SendRedirect::withMessage("voting", false, "Voting failed, please try again later");
        }

        return SendRedirect::withMessage("landing", true, "Thanks for voting " . $data["name"]);
    }

    private function checkNISN(string $nisn)
    {
        $client = new Client();
        $url = "https://absensi.smktarunabhakti.net:3995/api/pilketos/check-nisn";

        $headers = [
            "X-Secret" => env("X_SECRET_API_TOKEN"),
            "Content-Type" => "application/json"
        ];

        $body = json_encode(['nisn' => $nisn]);

        try {
            $response = $client->post($url, [
                'headers' => $headers,
                'body' => $body,
            ]);

            $data = json_decode($response->getBody(), true);
            return $data;

        } catch (\Exception $e) {
            return false;
        }
    }

}
