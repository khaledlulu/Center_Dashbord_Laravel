<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = ModelsRole::withcount('permissions')->orderBy('id', 'asc')->Paginate(7);
        return response()->view('dashbord.Spatiy.Role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = ModelsPermission::all();
        return response()->view('dashbord.Spatiy.Role.create', compact('permissions'));
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
            $roles = new ModelsRole();
            $roles->guard_name = $request->get('guard_name');
            $roles->name = $request->get('name');
            $isSaved = $roles->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => "Crateed is Successfully"], 200);
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
        $roles = ModelsRole::findOrFail($id);
        return response()->view('dashbord.Spatiy.Role.edit', compact('roles'));
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
            $roles = ModelsRole::findOrFail($id);
            $roles->guard_name = $request->get('guard_name');
            $roles->name = $request->get('name');
            $isUpdate = $roles->save();
            return ['redirect' => route('roles.index')];
            if ($isUpdate) {
                return response()->json(['icon' => 'success', 'title' => "Updated  is Successfully"], 200);
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
        $roles = ModelsRole::destroy($id);
        return response()->json(['message' => $roles ? 'Deleted Successfully' : ' Deleted Fialed'], $roles ? 200 : 400);
    }
}
