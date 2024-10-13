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
}
