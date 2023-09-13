<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Studant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class APIStudantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $studants = Studant::with('user')->orderBy('id', 'asc')->paginate(7);
        return response()->json([
            'status' => true,
            'message' => 'This is Index Employee',
            'data' => $studants
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
                // $roles = Role::findOrFail($request->get('role_id'));
                // $studants->assignRole($roles->name);
                $users->first_name = $request->get("first_name");
                $users->last_name = $request->get("last_name");
                $users->mobile = $request->get("mobile");
                $users->date_of_brith = $request->get("date_of_brith");
                $users->speciality = $request->get("speciality");
                $users->salary_value = $request->get("salary_value");
                $users->salary_type = $request->get("salary_type");
                $users->currancy = $request->get("currancy");
                $users->certification = $request->get("certification");
                $users->job_title = $request->get("job_title");
                $users->cities_id = $request->get("cities_id");
                $users->actor()->associate($studants);
                $isSaved = $users->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Created  Employee is successfully',
                    'data' => $users
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Created  Employee is Failed',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Created  Employee is Failed',
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
            // 'image' => "image|max:2048|mimes:png,jpg,jpeg,pdf",

        ]);
        if (!$validator->fails()) {
            $studants = Studant::findOrFail($id);
            $studants->email = $request->get('email');

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
            $isUpdate = $studants->save();
            if ($isUpdate) {
                $users = $studants->user;
                // $roles = Role::findOrFail($request->get('role_id'));
                // $studants->assignRole($roles->name);
                $users->first_name = $request->get("first_name");
                $users->last_name = $request->get("last_name");
                $users->mobile = $request->get("mobile");
                $users->date_of_brith = $request->get("date_of_brith");
                $users->speciality = $request->get("speciality");
                $users->salary_value = $request->get("salary_value");
                $users->salary_type = $request->get("salary_type");
                $users->currancy = $request->get("currancy");
                $users->certification = $request->get("certification");
                $users->job_title = $request->get("job_title");
                $users->cities_id = $request->get("cities_id");
                // $users->actor()->associate($studants);
                $isUpdate = $users->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Updated  Studant is successfully',
                    'data' => $studants
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Updated  Studant is Failed',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Updated  Studant is Failed',
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
        $studants = Studant::FindOrFail($id);
        $studants->delete();
        return response()->json([
            'status' => true,
            'message' => 'The Deleted is Successfully',
        ], $studants ? 200 : 400);
    }
}