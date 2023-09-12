<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class APICityCountroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('id', 'asc')->paginate(7);
        return response()->json([
            'status' => true,
            'message' => 'This is index of City',
            'data' => $cities
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
            'name' => 'required|string|min:3|max:20',
            'street' => 'required|string|min:3|max:20',
        ]);
        if (!$validator->fails()) {
            $cities = new City();
            $cities->name = $request->get('name');
            $cities->street = $request->get('street');
            $isSaved = $cities->save();
            if ($isSaved) {

                return response()->json([
                    'status' => true,
                    'message' => 'Created is Successfuly',
                    'data' => $cities
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Created is Failed',
                    'data' => $cities
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first()
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
            'name' => 'required|string|min:3|max:20',
            'street' => 'required|string|min:3|max:20',
        ]);
        if (!$validator->fails()) {
            $cities = City::FindOrFail($id);
            $cities->name = $request->get('name');
            $cities->street = $request->get('street');
            $isUpdated = $cities->save();
            if ($isUpdated) {
                return response()->json([
                    'status' => true,
                    'message' => 'updated is Successfuly',
                    'data' => $cities
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'updated is Failed',
                    'data' => $cities
                ], 400);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => $validator->getMessageBag()->first()
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
        $cities = City::FindOrFail($id);
        $cities->delete();
        return response()->json([
            'status' => true,
            'message' => 'The Deleted is Successfully',
        ], $cities ? 200 : 400);
    }
}
