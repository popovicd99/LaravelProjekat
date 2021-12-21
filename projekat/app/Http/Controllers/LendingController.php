<?php

namespace App\Http\Controllers;

use App\Http\Resources\LendingResource;
use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LendingController extends Controller
{
    public function index()
    {
        $lendings = Lending::all();
        return LendingResource::collection($lendings);
    }
    public function store(Request $request)
    {
        $today = date("Y-m-d");
        $validator = Validator::make($request->all(),[
            'book_id'=>'required'
        ]);

        if($validator->fails())
        return response()->json($validator->errors());
                
            
        $lending = Lending::create([
            'return_date'=>date('Y-m-d', strtotime($today. ' + 14 days')),
            'book_id'=>$request->book_id,
            'user_id'=>Auth::user()->id
        ]);

        return response()->json(['Book borrowed successfully.', new LendingResource($lending)]);
    }

    public function update(Request $request,Lending $lending)
    {
        $validator = Validator::make($request->all(),[
            'return_date'=>'required|date_format:Y-m-d'
        ]);

        if($validator->fails())
        return response()->json($validator->errors());

        $lending->return_date = $request->return_date;
        $lending->save();
        return response()->json(["Lending successfully updated.",new LendingResource($lending)]);
    }

    public function destroy(Lending $lending)
    {
        $lending->delete();
        return response()->json('Lending deleted.');
    }
}
