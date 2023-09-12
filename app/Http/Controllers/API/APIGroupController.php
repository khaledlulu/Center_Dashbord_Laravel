<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use App\Models\Group;
use App\Models\Room;
use Illuminate\Http\Request;

class APIGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomas = Diploma::all();
        $rooms = Room::all();
        $groups = Group::all();
        return response()->json([
            'status' => true,
            'message' => 'This is index Group',
            'data' => $groups
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
        $validator = validator($request->all(), [
            'group_name' => 'required',
            'group_number' => 'required',
            'days' => 'required',
        ]);
        if (!$validator->fails()) {
            $groups = new Group();
            $groups->group_name = $request->get('group_name');
            $groups->group_number = $request->get('group_number');
            $groups->days = $request->get('days');
            $groups->diploma_id = $request->get('diploma_id');

            $isSaved = $groups->save();

            if ($isSaved) {

                return response()->json([
                    'status' => true,
                    'message' => 'Created is Successfully',
                    'data' => $groups
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Created is Failed',
                    'data' => $groups
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
            'group_name' => 'required',
            'group_number' => 'required',
            'days' => 'required',
        ]);
        if (!$validator->fails()) {
            $groups = Group::findOrFail($id);
            $groups->group_name = $request->get('group_name');
            $groups->group_number = $request->get('group_number');
            $groups->days = $request->get('days');
            $groups->diploma_id = $request->get('diploma_id');

            $isUpdate = $groups->save();

            if ($isUpdate) {

                return response()->json([
                    'status' => true,
                    'message' => 'Updated is Successfully',
                    'data' => $groups
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Updated is Failed',
                    'data' => $groups
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
    { {
            $groups = Group::FindOrFail($id);
            $groups->delete();
            return response()->json([
                'status' => true,
                'message' => 'The Deleted is Successfully',
            ], $groups ? 200 : 400);
        }
    }
}
