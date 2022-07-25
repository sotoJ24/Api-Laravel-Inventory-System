<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Api\v1\Root;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('statuses_id',4)->get();
        return response()->json($user,200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:72',
            'email' => 'required|string|max:96',
            'password' => 'required|string|min:8',
            'rol_id' => 'required|numeric',
            'campus_id' => 'required|numeric',
            'statuses_id' => 'required|numeric'
        ]);

        $user = User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => Hash::make($validation['password']),
            'rol_id' => $validation['rol_id'],
            'campus_id' => $validation['campus_id'],
            'statuses_id' => $validation['statuses_id']
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|unique:users',
            'IdRol' => 'required|numeric',
            'campus_id' => 'required|numeric',
            'statuses_id' => 'required|numeric'
        ]);

        $user->update($request->all());
        return response()->json($user,200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $changeStatus = User::find($id);
        $changeStatus->statuses_id = $request->statuses_id;
        $changeStatus->save();
        return response()->json($changeStatus, 200);
    }

    public function login(Request $request)
    {
            if(!Auth::attempt($request->only('email', 'password'))){
                return response()->json([
                    'message' => 'Error de credenciales'
                ], 401);
            }
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'campus_id' => $user['campus_id']
            ]);
    }
}
