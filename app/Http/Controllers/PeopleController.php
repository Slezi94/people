<?php

namespace App\Http\Controllers;

use App\User;
use App\DeletedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
    public function show($email){
        $user = User::find($email);
        if(is_null($user)){
            return response()->json(['message' => 'User nem található!'], 400);
        }
        return response()->json($user::find($email), 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email',
            'dept' => 'required|string',
            'rank' => 'required|string',
            'phone' => ['required','regex:/^\+36 \(1\) 666-[0-9]{4}$/']
        ]);

        if($validator->fails()) {
            return response()->json(['message' => 'User-t nem sikerült létrehozni!'], 400);
        }

        $user = User::create($request->only([
            'name',
            'email',
            'dept',
            'rank',
            'phone',
            'room'
        ]));

        $user->save();
        return response()->json($user, 200);
    }

    public function destroy($email){
        $user = User::find($email);

        if(is_null($user)){
            return response()->json(['message' => 'User nem található!'], 400);
        }

        $deletedUser = DeletedUser::create([
            'name' => $user->name,
            'email' => $user->email,
            'dept' => $user->dept,
            'rank' => $user->rank,
            'phone' => $user->phone,
            'room' => $user->room,
            'remember_token' => $user->remember_token
        ]);

        $deletedUser->save();
        $user->delete();

        return response()->json($deletedUser, 200);
    }
}
