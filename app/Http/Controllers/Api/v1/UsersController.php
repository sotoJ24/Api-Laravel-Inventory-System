<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
            'password' => 'required|string|max:30',
            'rol_id' => 'required|numeric',
            'campus_id' => 'required|numeric',
            'statuses_id' => 'required|numeric'
        ]);

        $user = null;
        if($validation)
        {
            $user = User::create($request->all());
            return response()->json($user,201);
        }
        return response()->json($user,417);

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
            'name' => 'required|string|max:72',
            'email' => 'required|string|max:96',
            'password' => 'required|string|max:30',
            'IdRol' => 'required|numeric',
            'campus_Id' => 'required|numeric',
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
}
