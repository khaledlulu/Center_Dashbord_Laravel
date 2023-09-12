<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = ModelsPermission::orderBy('id', 'asc')->Paginate(25);
        return response()->view('dashbord.Spatiy.Permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashbord.Spatiy.Permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'guard_name' => 'required|string',
            'name' => 'required|string',
        ]);


        if (!$validator->fails()) {
            $permissions = new ModelsPermission();
            $permissions->guard_name = $request->get('guard_name');
            $permissions->name = $request->get('name');
            $isSaved = $permissions->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => "Crateed  is Successfully"], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => "Crateed  is Failed"], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = ModelsPermission::findOrFail($id);
        return response()->view('dashbord.Spatiy.Permission.edit', compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'guard_name' => 'required|string',
            'name' => 'required|string',
        ]);


        if (!$validator->fails()) {
            $permissions = ModelsPermission::findOrFail($id);
            $permissions->guard_name = $request->get('guard_name');
            $permissions->name = $request->get('name');
            $isUpdated = $permissions->save();
            return ['redirect' => route('permissions.index')];

            if ($isUpdated) {
                return response()->json(['icon' => 'success', 'title' => "Updated is Successfully"], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => "Updated is Failed"], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = ModelsPermission::destroy($id);
        return response()->json(['icon' => 'error', 'title' => $permissions ? 'Deleted Successfully' : ' Deleted Fialed'], $permissions ? 200 : 400);
    }
}
