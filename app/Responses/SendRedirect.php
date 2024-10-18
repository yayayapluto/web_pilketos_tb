<?php

namespace App\Responses;
use Redirect;
use Session;

class SendRedirect
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function withMessage(string $route, $success = true, $message = null) {
        if ($success) {
            return Redirect::route($route)->with("success", $message ?? "succesful");
        }
        else {
            return Redirect::route($route)->withErrors($message ?? "errors occured");
        }
    }

    public static function withEaster(string $route, $message) {
        return Redirect::route($route)->with("easter", $message ?? "Booo.");
    }

    public static function withJson(string $route = "landing", $success = true, $message = null, $easter = false) {
        return response()->json([
            "success" => $success,
            "msg" => $message ?? "Berhasil!",
            "route" => $route,
            "easter" => $easter
        ]);
    }
}
