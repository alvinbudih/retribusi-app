<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    // public function get($id)
    // {
    //     $statusCode = 200;
    //     $message = "success";
    //     $user = User::with("roles")->findOrFail($id);

    //     return response()->json([
    //         "statusCode" => $statusCode,
    //         "message" => $message,
    //         "data" => $user
    //     ], $statusCode);
    // }
}
