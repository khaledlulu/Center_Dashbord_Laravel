<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\Room;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $diplomas = Diploma::withcount('groups')->orderBy('id', 'asc');

        if ($request->get('name')) {
            $diplomas = $diplomas->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('tranning_type')) {
            $diplomas = $diplomas->where('tranning_type', 'like', '%' . $request->tranning_type . '%');
        }
        if ($request->get('status')) {
            $diplomas = $diplomas->where('status', 'like', '%' . $request->status . '%');
        }
        $diplomas = $diplomas->paginate(7);
        return response()->view('dashbord.diploma.index', compact('diplomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        return response()->view('dashbord.diploma.create', compact('rooms'));
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
                return response()->json(['icon' => 'success', 'title' => 'Created is Successfully']);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Created is Filed']);
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
        $diplomas = Diploma::findOrFail($id);
        $rooms = Room::all();
        return response()->view('dashbord.diploma.show', compact('diplomas', 'rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = Room::all();
        $diplomas = Diploma::findOrFail($id);
        return response()->view('dashbord.diploma.edit', compact('diplomas', 'rooms'));
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
            $diplomas->price = $request->get('price');
            $diplomas->speciality = $request->get('speciality');
            $diplomas->currancy = $request->get('currancy');
            $diplomas->number_of_studants = $request->get('number_of_studants');
            $diplomas->status = $request->get('status');
            $diplomas->room_id = $request->get('room_id');
            $diplomas->description = $request->get('description');
            $isSaved = $diplomas->save();
            return ['redirect' => route('diplomas.index')];
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'Updated  is Successfully']);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Updated is Filed']);
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
        $diplomas = Diploma::destroy($id);
    }
}
