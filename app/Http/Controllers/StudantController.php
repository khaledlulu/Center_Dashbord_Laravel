<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Studant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studants = Studant::with('user')->orderBy('id', 'asc')->paginate(7);
        // $this->authorize('view', Studant::class);
        return response()->view('dashbord.studant.index', compact('studants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name', 'studant')->get();
        // $this->authorize('create', Studant::class);
        return response()->view('dashbord.studant.create', compact('cities', 'roles'));
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
            'image' => "image|max:2048|mimes:png,jpg,jpeg,pdf",

        ]);
        if (!$validator->fails()) {
            $studants = new Studant();
            $studants->email = $request->get('email');
            $studants->password = Hash::make($request->get('password'));
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/studant', $imageName);
                $studants->image = $imageName;
            }
            if (request()->hasFile('cv')) {
                $cv = $request->file('cv');
                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                $cv->move('storage/files/studant', $fileName);
                $studants->cv = $fileName;
            }
            //image / cv
            $isSaved = $studants->save();
            if ($isSaved) {
                $users = new User();
                $roles = Role::findOrFail($request->get('role_id'));
                $studants->assignRole($roles->name);
                $users->first_name = $request->get("first_name");
                $users->last_name = $request->get("last_name");
                $users->mobile = $request->get("mobile");
                $users->date_of_brith = $request->get("date_of_brith");
                $users->speciality = $request->get("speciality");
                $users->salary_value = $request->get("salary_value");
                $users->currancy = $request->get("currancy");
                $users->certification = $request->get("certification");
                $users->job_title = $request->get("job_title");
                $users->cities_id = $request->get("cities_id");
                $users->actor()->associate($studants);
                $isSaved = $users->save();
                return response()->json(['icon' => 'success', 'title' => 'Crateed is successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Crateed is falid'], 400);
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
        $studants = Studant::findOrFail($id);
        $cities = City::all();
        return response()->view('dashbord.studant.show', compact('studants', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $studants = Studant::with('user')->findOrFail($id);
        // $this->authorize('update', Studant::class);
        return response()->view('dashbord.studant.edit', compact('cities', 'studants'));
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
        $validator = validator($request->all(), []);
        if (!$validator->fails()) {
            $studants = Studant::findOrFail($id);
            $studants->email = $request->get('email');
            // create image
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/studant', $imageName);
                $studants->image = $imageName;
            }
            // crate cv
            if (request()->hasFile('cv')) {
                $cv = $request->file('cv');
                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                $cv->move('storage/files/studant', $fileName);
                $studants->cv = $fileName;
            }

            $isUpdate = $studants->save();
            if ($isUpdate) {
                $users = $studants->user;
                $users->first_name = $request->get("first_name");
                $users->last_name = $request->get("last_name");
                $users->mobile = $request->get("mobile");
                $users->date_of_brith = $request->get("date_of_brith");
                $users->speciality = $request->get("speciality");
                $users->salary_value = $request->get("salary_value");
                $users->currancy = $request->get("currancy");
                $users->certification = $request->get("certification");
                $users->job_title = $request->get("job_title");
                $users->cities_id = $request->get("cities_id");
                $users->actor()->associate($studants);
                $isUpdate = $users->save();
                return ['redirect' => route('studants.index')];
                return response()->json(['icon' => 'success', 'title' => 'Updated is successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Updated is falid'], 400);
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
    public function destroy(Studant $studant)
    {
        // $this->authorize('delete', Studant::class);

        // $studants = Studant::destroy($id);

        //  الي مسجل دخول للنظام studant هان بيخليه ما يقدر يحذف نفسه ال

        if ($studant->id == Auth::id()) {
            return redirect(route('studants.index'))->withErrors(trans('Cannot Delete Yourslef'));
        } else {
            $studant->user()->delete();
            $isdeleted = $studant->delete();
            return response()->json(['icon' => 'Success', 'title' => 'Deleted is successfully'], 200);
        }
    }
}
