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

        if ($data["nisn"] == "1234567890") {
            return SendRedirect::withEaster("voting", "Kenapa di tes coba?");
        }

        if ($data["nisn"] == "6969696969") {
            return SendRedirect::withEaster("voting", "Enam dan Sembilan?");
        }

        if ($data["nisn"] == "1111111111") {
            return SendRedirect::withEaster("voting", "Kenapa jadi repetitif?");
        }

        if ($data["nisn"] == "9876543210") {
            return SendRedirect::withEaster("voting", "Hampir kayak hitung mundur!");
        }

        if ($data["nisn"] == "1231231234") {
            return SendRedirect::withEaster("voting", "Tiga kali lipat kesenangan!");
        }

        if ($data["nisn"] == "8888888888") {
            return SendRedirect::withEaster("voting", "Nomor delapan yang beruntung!");
        }

        if ($data["nisn"] == "1010101010") {
            return SendRedirect::withEaster("voting", "Kode biner!");
        }

        $resData = $this->checkNISN((string) $req->input("nisn"));

        if (!$resData["status"] || $resData["data"]["data"] === null) {
            return SendRedirect::withMessage("voting", false, "Siswa tidak di temukan");
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

        return SendRedirect::withMessage("landing", true, "Thanks for voting " . ($data["name"] ?? "Entitas"));
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
            'verify' => false // Disable SSL verification
        ]);

        $data = json_decode($response->getBody(), true);
        return [
            "status" => $data["success"] ?? false,
            "data" => $data,
            "msg" => $data["msg"] ?? "-"
        ];
    } catch (RequestException $e) {
        // Handle error
        return [
            "status" => false,
            "message" => $e->getMessage()
        ];
    }
}

}
