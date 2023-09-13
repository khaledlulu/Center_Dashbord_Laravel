<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use Illuminate\Http\Request;

class APIDiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomas = Diploma::withcount('groups')->orderBy('id', 'asc')->paginate(5);
        return response()->json([
            'status' => true,
            'message' => 'This is Index Diploma',
            'data' => $diplomas
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
            "name" => ['required'],
            "tranning_type" => ['required'],
            "tranning_type" => ['required'],
            "number_of_hours" => ['required'],
            "price" => ['required'],
            "currancy" => ['required'],
            "status" => ['required'],

        ]);
        if (!$validator->fails()) {
            $diplomas = new Diploma();
            $diplomas->name = $request->get('name');
            $diplomas->tranning_type = $request->get('tranning_type');
            $diplomas->number_of_hours = $request->get('number_of_hours');
            $diplomas->start_date = $request->get('start_date');
            $diplomas->end_date = $request->get('end_date');
            $diplomas->degree = $request->get('degree');
            $diplomas->speciality = $request->get('speciality');
            $diplomas->price = $request->get('price');
            $diplomas->currancy = $request->get('currancy');
            $diplomas->number_of_studants = $request->get('number_of_studants');
            $diplomas->status = $request->get('status');
            $diplomas->room_id = $request->get('room_id');
            $diplomas->description = $request->get('description');
            $isSaved = $diplomas->save();
            if ($isSaved) {
                return response()->json([
                    'status' => true,
                    'message' => 'Created is Successfully',
                    'data' => $diplomas
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Created is Failed',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Created is Failed',
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
            "name" => ['required'],
            "tranning_type" => ['required'],
            "tranning_type" => ['required'],
            "number_of_hours" => ['required'],
            "price" => ['required'],
            "currancy" => ['required'],
            "status" => ['required'],

        ]);
        if (!$validator->fails()) {
            $diplomas = Diploma::findOrFail($id);
            $diplomas->name = $request->get('name');
            $diplomas->tranning_type = $request->get('tranning_type');
            $diplomas->number_of_hours = $request->get('number_of_hours');
            $diplomas->start_date = $request->get('start_date');
            $diplomas->end_date = $request->get('end_date');
            $diplomas->degree = $request->get('degree');
            $diplomas->speciality = $request->get('speciality');
            $diplomas->price = $request->get('price');
            $diplomas->currancy = $request->get('currancy');
            $diplomas->number_of_studants = $request->get('number_of_studants');
            $diplomas->status = $request->get('status');
            $diplomas->room_id = $request->get('room_id');
            $diplomas->description = $request->get('description');
            $isUpdate = $diplomas->save();
            if ($isUpdate) {
                return response()->json([
                    'status' => true,
                    'message' => 'Created is Successfully',
                    'data' => $diplomas
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Created is Failed',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Created is Failed',
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
        $diplomas = Diploma::FindOrFail($id);
        $diplomas->delete();
        return response()->json([
            'status' => true,
            'message' => 'The Deleted is Successfully',
        ], $diplomas ? 200 : 400);
    }
}
