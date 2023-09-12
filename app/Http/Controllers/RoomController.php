<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = Room::orderBy('id', 'asc');

        if ($request->get('room_number')) {
            $rooms = $rooms->where('room_number', 'like', '%' . $request->room_number . '%');
        }
        $rooms = $rooms->paginate(7);

        return response()->view('dashbord.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashbord.room.create');
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
            'room_number' => 'required|mix:10',
            'room_number' => 'required'
        ]);
        if (!$validator->fails()) {
            $rooms = new Room();
            $rooms->room_number = $request->get('room_number');
            $rooms->time = $request->get('time');

            $isSaved = $rooms->save();
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
        $rooms = Room::findOrFail($id);
        return response()->view('dashbord.room.edit', compact('rooms'));
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
            'room_number' => 'required|mix:10',
            'room_number' => 'required'
        ]);
        if (!$validator->fails()) {
            $rooms = Room::findOrFail($id);
            $rooms->room_number = $request->get('room_number');
            $rooms->time = $request->get('time');

            $isUpdate = $rooms->save();
            return ['redirect' => route('rooms.index')];
            if ($isUpdate) {

                return response()->json(['icon' => 'success', 'title' => 'Update is SuccessFuly'], 200);
            } else {
                return response()->json(['icon' => 'erorr', 'title' => 'Update is Failed'], 400);
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
        $rooms = Room::destroy($id);
    }
}
