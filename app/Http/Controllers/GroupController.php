<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\Group;
use App\Models\Room;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexGroup($id)
    {
        //
        $diplomas = Diploma::all();
        $groups = Group::where('diploma_id', $id)->orderBy('created_at', 'asc')->paginate(5);
        return response()->view('dashbord.group.index', compact('groups', 'id', 'diplomas'));
    }

    public function createGroup($id)
    {
        $rooms = Room::all();
        $diplomas = Diploma::where('diploma_id', $id);
        return response()->view('dashbord.group.create', compact('id', 'rooms', 'diplomas'));
    }


    public function index()
    {
        $diplomas = Diploma::all();
        $groups = Group::with('diploma')->orderBy('created_at', 'asc')->paginate(5);
        return response()->view('dashbord.group.indexall', compact('groups', 'diplomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diplomas = Diploma::all();
        $groups = Group::all();
        return response()->view('dashbord.group.create', compact('diplomas', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'group_name' => 'required',
            'group_number' => 'required',
            'days' => 'required',
            // 'diploma_id' => 'required'
        ]);
        if (!$validator->fails()) {
            $groups = new Group();
            $groups->group_name = $request->get('group_name');
            $groups->group_number = $request->get('group_number');
            $groups->days = $request->get('days');
            $groups->diploma_id = $request->get('diploma_id');

            $isSaved = $groups->save();

            if ($isSaved) {

                return response()->json(['icon' => 'success', 'title' => 'Created is SuccessFuly'], 200);
            } else {
                return response()->json(['icon' => 'erorr', 'title' => 'Created is Failed'], 400);
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
        // $groups = Group::findOrFial($id);
        $groups = Group::findOrFail($id);

        $diplomas = Diploma::all();
        return response()->view('dashbord.group.edit', compact('groups', 'diplomas'));
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
        $validator = validator($request->all(), [
            'group_name' => 'required',
            'group_number' => 'required',
            'days' => 'required',
            // 'diploma_id' => 'required'
        ]);
        if (!$validator->fails()) {
            $groups = Group::findOrFail($id);
            $groups->group_name = $request->get('group_name');
            $groups->group_number = $request->get('group_number');
            $groups->days = $request->get('days');
            $groups->diploma_id = $request->get('diploma_id');

            $isUpdate = $groups->save();
            return ['redirect' => route('groups.index')];
            if ($isUpdate) {

                return response()->json(['icon' => 'success', 'title' => 'Updated is SuccessFuly'], 200);
            } else {
                return response()->json(['icon' => 'erorr', 'title' => 'Updated is Failed'], 400);
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
        $groups = Group::destroy($id);
    }
}
