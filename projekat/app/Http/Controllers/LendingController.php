<?php

namespace App\Http\Controllers;

use App\Http\Resources\LendingResource;
use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index()
    {
        $lendings = Lending::all();
        return LendingResource::collection($lendings);
    }
}
