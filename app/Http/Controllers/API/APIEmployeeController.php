<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class APIEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('user')->orderBy('id', 'asc')->paginate(7);
        return response()->json([
            'staus' => true,
            'message' => 'This is Index Employee',
            'data' => $employees
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
        $validator = validator($request->all(), []);
        if (!$validator->fails()) {
            $employees = new Employee();
            $employees->email = $request->get('email');
            $employees->password = Hash::make($request->get('password'));
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/Employee', $imageName);
                $employees->image = $imageName;
            }
            if (request()->hasFile('cv')) {
                $cv = $request->file('cv');
                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                $cv->move('storage/files/Employee', $fileName);
                $employees->cv = $fileName;
            }
            //image / cv
            $isSaved = $employees->save();
            if ($isSaved) {
                $users = new User();
                // $roles = Role::findOrFail($request->get('role_id'));
                // $employees->assignRole($roles->name);
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
                $users->actor()->associate($employees);
                $isSaved = $users->save();
                return response()->json([
                    'staus' => true,
                    'message' => 'Created Successfully',
                    'data' => $users
                ], 200);
            } else {
                return response()->json([
                    'staus' => true,
                    'message' => 'Created is Falied',
                ], 400);
            }
        } else {
            return response()->json([
                'staus' => false,
                'message' => 'Created is Falied',
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
        $validator = validator($request->all(), []);
        if (!$validator->fails()) {
            $employees = Employee::findOrFail($id);
            $employees->email = $request->get('email');
            // $employees->password = Hash::make($request->get('password'));
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/Employee', $imageName);
                $employees->image = $imageName;
            }
            if (request()->hasFile('cv')) {
                $cv = $request->file('cv');
                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                $cv->move('storage/files/Employee', $fileName);
                $employees->cv = $fileName;
            }
            //image / cv
            $isUpdate = $employees->save();
            if ($isUpdate) {
                $users = $employees->user;
                // $roles = Role::findOrFail($request->get('role_id'));
                // $employees->assignRole($roles->name);
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
                // $users->actor()->associate($employees);
                $isUpdate = $users->save();
                return response()->json([
                    'staus' => true,
                    'message' => 'Updated Successfully',
                    'data' => $employees
                ], 200);
            } else {
                return response()->json([
                    'staus' => true,
                    'message' => 'Updated is Falied',
                ], 400);
            }
        } else {
            return response()->json([
                'staus' => false,
                'message' => 'Updated is Falied',
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
        $employees = Employee::FindOrFail($id);
        $employees->delete();
        return response()->json([
            'status' => true,
            'message' => 'The Deleted is Successfully',
        ], $employees ? 200 : 400);
    }
}
