<?php

namespace App\Http\Controllers;

use App\Http\Resources\LendingResource;
use App\Models\Lending;
use Illuminate\Http\Request;

class UserLendingController extends Controller
{
    public function index($user_id)
    {
        $lendings = Lending::get()->where('user_id',$user_id);
        if(is_null($lendings))return response()->json("Data not found",404);
        return response()->json(LendingResource::collection($lendings)); 
    }
}
