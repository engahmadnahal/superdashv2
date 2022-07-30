<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeasdController extends Controller
{
    // Success Response
    public function sendResponse($result,$message){
        $response = [
            'success' => true,
            'data'=> $result,
            'message'=>$message
        ];
        // return Json data
        return response()->json($response);
    }
    // Error Response
    public function sendError($error,$errorMessage=[],$code = 404){
        $response = [
            'success' => false,
            'data'=> $error,

        ];

        if(!empty($errorMessage)){
            $response['data'] = $errorMessage;
        }

        // return Json data
        return response()->json($response,$code);
    }
}
