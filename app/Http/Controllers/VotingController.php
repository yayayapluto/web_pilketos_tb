<?php

namespace App\Http\Controllers;

use App\Http\Requests\Voting\storeRequest;
use App\Models\Voting;
use App\Models\VotingConfig;
use App\Responses\SendRedirect;
use Carbon\Carbon;
use Config;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    const NISN_NOT_REGISTERED_MESSAGE = "NISN tidak terdaftar nih di database";
    const NISN_ALREADY_VOTED_MESSAGE = "Cuma boleh vote sekali yhh";
    const VOTING_FAILED_MESSAGE = "Votingnya gagalll, coba lagiii";

    public function store(storeRequest $req)
    {
        $votingStatus = $this->checkVotingTime();

        if ($votingStatus['status'] == "before") {
            return SendRedirect::withJson("countdown", false, "Pemilihan belum dimulai");
        } elseif ($votingStatus['status'] == "after") {
            return SendRedirect::withJson("deadline", false, "Pemilihan udah selesai");

        }

        $data = $req->validated();

        if ($data["nisn"] == "1234567890") {
            return SendRedirect::withJson("voting", true, "Jahil yah kamuu  ///>_<///", true);
        }

        if ($data["nisn"] == "6969696969") {
            return SendRedirect::withJson("voting", true, "Jahil yah kamuu  ///>_<///", true);
        }

        if ($data["nisn"] == "1111111111") {
            return SendRedirect::withJson("voting", true, "Jahil yah kamuu  ///>_<///", true);
        }

        if ($data["nisn"] == "9876543210") {
            return SendRedirect::withJson("voting", true, "Jahil yah kamuu  ///>_<///", true);
        }

        if ($data["nisn"] == "1231231234") {
            return SendRedirect::withJson("voting", true, "Jahil yah kamuu  ///>_<///", true);
        }

        if ($data["nisn"] == "8888888888") {
            return SendRedirect::withJson("voting", true, "Jahil yah kamuu  ///>_<///", true);
        }

        if ($data["nisn"] == "1010101010") {
            return SendRedirect::withJson("voting", true, "Jahil yah kamuu  ///>_<///", true);
        }

        $resData = $this->checkNISN((string) $req->input("nisn"));

        if (!$resData["status"] || $resData["data"]["data"] === null) {
            return SendRedirect::withJson("voting", false, self::NISN_NOT_REGISTERED_MESSAGE);
        }

        $studentsData = $resData["data"]["data"];

        if (Voting::where("nisn", $data["nisn"])->exists()) {
            return SendRedirect::withJson("voting", false, self::NISN_ALREADY_VOTED_MESSAGE);
        }

        $data["voting_id"] = (string) \Str::uuid();
        $data["name"] = $studentsData["nama_siswa"] ?? null;
        $data["class"] = $studentsData["id_kelas"] ?? null;

        if (!Voting::create($data)) {
            return SendRedirect::withJson("voting", false, self::VOTING_FAILED_MESSAGE);
        }

        return SendRedirect::withJson("landing", true, "Makasih udah voting, " . ($data["name"] ?? "Entitas"));
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
            return [
                "status" => false,
                "message" => $e->getMessage()
            ];
        }
    }

    public function votingTimeForm()
    {
        $votingConfig = VotingConfig::first();

        $data = [
            'start' => $votingConfig ? $votingConfig->start_datetime : null,
            'end' => $votingConfig ? $votingConfig->end_datetime : null,
        ];

        return view("admin.voting_time", compact('data'));
    }


    public function updateVotingTime(Request $request)
    {
        $timezone = 'Asia/Jakarta';

        $request->validate([
            'start' => 'required|date_format:Y-m-d\TH:i',
            'end' => 'required|date_format:Y-m-d\TH:i|after:start',
        ]);

        $startDateTime = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('start'), $timezone);
        $endDateTime = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('end'), $timezone);

        VotingConfig::updateOrCreate(
            [],
            [
                'start_datetime' => $startDateTime->format('Y-m-d\TH:i'),
                'end_datetime' => $endDateTime->format('Y-m-d\TH:i'),
            ]
        );

        return SendRedirect::withMessage("votingTime", true, "Berhasil memperbarui waktu pemilihan");
    }

    public function checkVotingTime()
    {
        $timezone = "Asia/Jakarta";
        [$startDateTime, $endDateTime] = $this->getVotingTime();
        $currentDateTime = Carbon::now($timezone);

        if (is_null($startDateTime) && is_null($endDateTime)) {
            return [
                'status' => 'before',
                'remaining_hours' => "Tidak tahu",
            ];
        }

        if ($currentDateTime->lessThan($startDateTime)) {
            return [
                'status' => 'before',
                'datetime' => $startDateTime,
            ];
        }

        if ($currentDateTime->greaterThanOrEqualTo($endDateTime)) {
            return [
                'status' => 'after',
                'datetime' => $endDateTime,
            ];
        }

        return [
            'status' => 'open',
            'datetime' => null,
        ];
    }


    private function getVotingTime()
    {
        $timezone = "Asia/Jakarta";
        $votingConfig = VotingConfig::first();

        if (!$votingConfig) {
            return [null, null];
        }

        $startDatetime = Carbon::createFromFormat('Y-m-d H:i:s', $votingConfig->start_datetime, $timezone);
        $endDatetime = Carbon::createFromFormat('Y-m-d H:i:s', $votingConfig->end_datetime, $timezone);

        return [
            $startDatetime->format('Y-m-d H:i:s'),
            $endDatetime->format('Y-m-d H:i:s'),
        ];
    }

}