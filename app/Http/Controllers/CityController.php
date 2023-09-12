<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::orderBy('id', 'asc');
        if ($request->get('name')) {
            $cities = $cities->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('street')) {
            $cities = $cities->where('street', 'like', '%' . $request->street . '%');
        }
        $cities = $cities->paginate(7);
        return response()->view('dashbord.City.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return response()->view('dashbord.City.Create',);
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
        $cities = City::FindOrFail($id);
        return response()->view('dashbord.City.Edit', compact('cities'));
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
            $isSaved = $cities->save();
            return ['redirect' => route('cities.index')];
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = City::destroy($id);
        return redirect(route('cities.index'));
    }
}
