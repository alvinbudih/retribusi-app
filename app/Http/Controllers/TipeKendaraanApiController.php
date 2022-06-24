<?php

namespace App\Http\Controllers;

use App\Models\TipeKendaraan;
use Illuminate\Http\Request;

class TipeKendaraanApiController extends Controller
{
    public function get($id = null)
    {
        $statusCode = 200;
        $message = "Success";
        $response = true;

        if ($id) {
            $tipe = TipeKendaraan::where("merk_kendaraan_id", $id)->get();
        } else {
            $statusCode = 404;
            $message = "Bad Request";
            $response = false;
            $tipe = [];
        }

        return response()->json([
            "statusCode" => $statusCode,
            "message" => $message,
            "response" => $response,
            "data" => $tipe
        ], $statusCode);
    }
}
