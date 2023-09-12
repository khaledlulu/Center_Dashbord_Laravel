<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class APIRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::orderBy('id', 'asc')->paginate(7);
        return response()->json([
            'status' => true,
            'message' => 'This is Index Rooms ',
            'data' => $rooms,
        ], 200);
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
            'room_number' => 'required|max:10',
            'time' => 'required'
        ]);
        if (!$validator->fails()) {
            $rooms = new Room();
            $rooms->room_number = $request->get('room_number');
            $rooms->time = $request->get('time');

            $isSaved = $rooms->save();
            if ($isSaved) {

                return response()->json([
                    'status' => true,
                    'message' => 'Created is SuccessFuly ',
                    'data' => $rooms,
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Created is Failed ',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Created is Failed ',
            ], 400);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            'room_number' => 'string|min:3|max:20',
            'time' => 'string|min:3|max:20',
        ]);
        if (!$validator->fails()) {
            $rooms = Room::findOrFail($id);
            $rooms->room_number = $request->get('room_number');
            $rooms->time = $request->get('time');
            $isUpdated = $rooms->save();
            if ($isUpdated) {
                return response()->json([
                    'status' => true,
                    'message' => 'updated is Successfully',
                    'data' => $rooms
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'updated is Failed',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ], 400);
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
        $rooms = Room::findOrFail($id);
        $rooms->delete();
        return response()->json([
            'status' => true,
            'message' => 'The Deleted is Successfully',
        ], $rooms ? 200 : 400);
    }
}
