<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\User::orderBy('name','ASC')->paginate(request('limit',20));
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $validation =  \Validator::make($request->all(),[

            'name' => 'required|min:5|max:190',
            'email' => 'required|min:5|max:190|email|unique:users',
            'password' => 'required|min:5|max:190',
        ]);

        if($validation->fails())
            return response()->json([
                'response' => false,
                'message' => $validation->errors(),
            ],400);
            
        $user = new \App\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \ Hash::make($request->password);
        $user->save();
        return response()->json($user);
    }

    public function show($id)
    {
        $user = \App\User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->name = $request->name;
        $user->save();
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = \App\User::find($id);
        $user->delete();
        return response()->json($user);
    }
}
