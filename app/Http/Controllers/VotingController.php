<?php

namespace App\Http\Controllers;

use App\Http\Requests\Voting\storeRequest;
use App\Models\Voting;
use App\Responses\SendRedirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    const NISN_NOT_REGISTERED_MESSAGE = "NISN not registered";
    const NISN_ALREADY_VOTED_MESSAGE = "NISN already voted";
    const VOTING_FAILED_MESSAGE = "Voting failed, please try again later";

    public function store(storeRequest $req)
    {
        $data = $req->validated();
        $resData = $this->checkNISN((string) $req->input("nisn"));

        if ($resData["status"] === false) {
            return SendRedirect::withMessage("voting", true, self::NISN_NOT_REGISTERED_MESSAGE);
        }

        $studentsData = $resData["data"]["data"];

        if (Voting::where("nisn", $data["nisn"])->exists()) {
            return SendRedirect::withMessage("voting", false, self::NISN_ALREADY_VOTED_MESSAGE);
        }

        $data["voting_id"] = (string) \Str::uuid();
        $data["name"] = $studentsData["nama_siswa"] ?? null;
        $data["class"] = $studentsData["id_kelas"] ?? null;

        if (!Voting::create($data)) {
            return SendRedirect::withMessage("voting", false, self::VOTING_FAILED_MESSAGE);
        }

        return SendRedirect::withMessage("landing", true, "Thanks for voting " . $data["name"] ?? "Entitas");
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
            return [
                "status" => true,
                "data" => $data
            ];

        } catch (RequestException $e) {
            \Log::error('NISN check failed: ' . $e->getMessage());
            return [
                "status" => false,
                "data" => null
            ];
        }
    }
}
