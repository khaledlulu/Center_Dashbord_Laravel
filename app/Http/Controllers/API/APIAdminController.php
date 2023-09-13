<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;

class APIAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with('user')->orderBy('id', 'asc')->paginate(7);
        return response()->json([
            'status' => true,
            'message' => 'This is Index Admin ',
            'data' => $admins,
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
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            //image
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/admin', $imageName);
                $admins->image = $imageName;
            }

            //   cv
            if (request()->hasFile('cv')) {
                $cv = $request->file('cv');
                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                $cv->move('storage/files/admin', $fileName);
                $admins->cv = $fileName;
            }

            $isSaved = $admins->save();
            if ($isSaved) {
                $users = new User();
                // $roles = Role::findOrFail($request->get('role_id'));
                // $admins->assignRole($roles->name);
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
                $users->actor()->associate($admins);
                $isSaved = $users->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Crateed is successfully',
                    'data' => $users
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Crateed is Failed'
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
            // 'email' => 'required|email',
            // 'image' => 'image|max:2048|mimes:png,jpg,jpeg,pdf',
        ]);
        if (!$validator->fails()) {
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get("email");

            // create image
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/admin', $imageName);
                $admins->image = $imageName;
            }
            // crate cv
            if (request()->hasFile('cv')) {
                $cv = $request->file('cv');
                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                $cv->move('storage/files/admin', $fileName);
                $admins->cv = $fileName;
            }

            $isUpdate = $admins->save();
            if ($isUpdate) {
                $users = $admins->user;
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
                // $users->actor()->associate($admins);
                $isUpdate = $users->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Updated is successfully',
                    'data' =>  $admins, $users
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Updated is Failed'
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = Admin::FindOrFail($id);
        $admins->delete();
        return response()->json([
            'status' => true,
            'message' => 'The Deleted is Successfully',
        ], $admins ? 200 : 400);
    }
}
