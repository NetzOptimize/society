<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    // public function footer()
    // {
    //     $data = file_get_contents("footercontent.txt");

    //    return [
    //         "data" => $data
    //     ];
    // }


    public function footer()
    {
        $filePath = public_path('footercontent.txt');

        $data = trim(file_get_contents($filePath));

        return response()->json([
            "data" => $data
        ]);

    }
}
