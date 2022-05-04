<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Root;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\db;

class RootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $root = Root::all();
        return response()->json($root,200);
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
            'user' => 'required|string|max:50|unique:roots',
            'password' => 'required|string|max:30',
            'email' => 'required|string|max:100|unique:roots',
            'status_id' => 'required|numeric'
        ]);
        $root = null;
        if($validation){
            $root = Root::create($request->all());
            return response()->json($root, 201);
        }
        return response()->json($root,417);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Root  $root
     * @return \Illuminate\Http\Response
     */
    public function show(Root $root)
    {
        //
    }
    public function getRootEdit($id){
        $root = Root::find($id);
        return response()->json($root,200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Root  $root
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Root $root)
    {

        $validation = $request->validate([
            'user' => 'required|string|max:50|unique:roots,user,'.$root->id,
            'password' => 'required|string|max:30',
            'email' => 'required|string|max:100|unique:roots,email,'.$root->id,
            'status_id' => 'required|numeric'
        ]);
        $root->update($request->all());
        return response()->json($root,200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Root  $root
     * @return \Illuminate\Http\Response
     */
    public function destroy(Root $root)
    {
        //
    }
}
