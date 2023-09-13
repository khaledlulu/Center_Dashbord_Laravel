<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('user')->orderBy('id', 'asc')->paginate(7);
        // $this->authorize('view', Employee::class);
        return response()->view('dashbord.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name', 'employee')->get();
        // $this->authorize('create', Employee::class);
        return response()->view('dashbord.employee.create', compact('cities', 'roles'));
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
                $roles = Role::findOrFail($request->get('role_id'));
                $employees->assignRole($roles->name);
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
                $users->actor()->associate($employees);
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
        $employees = Employee::findOrFail($id);
        $cities = City::all();
        return response()->view('dashbord.employee.show', compact('employees', 'cities'));
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
        $employees = Employee::with('user')->findOrFail($id);
        // $this->authorize('update', Employee::class);
        return response()->view('dashbord.employee.edit', compact('cities', 'employees'));
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
            $employees = Employee::findOrFail($id);
            $employees->email = $request->get("email");
            // create image
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/Employee', $imageName);
                $employees->image = $imageName;
            }
            // crate cv
            if (request()->hasFile('cv')) {
                $cv = $request->file('cv');
                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                $cv->move('storage/files/Employee', $fileName);
                $employees->cv = $fileName;
            }

            $isUpdate = $employees->save();
            if ($isUpdate) {
                $users = $employees->user;
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
                $users->actor()->associate($employees);
                $isUpdate = $users->save();
                return ['redirect' => route('employees.index')];
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
    public function destroy(Employee $employee)
    {
        // $this->authorize('delete', Employee::class);

        // $employees = Employee::destroy($id);
        //  الي مسجل دخول للنظام employee هان بيخليه ما يقدر يحذف نفسه ال

        if ($employee->id == Auth::id()) {
            return redirect(route('employees.index'))->withErrors(trans('Cannot Delete Yourslef'));
        } else {
            $employee->user()->delete();
            $isdeleted = $employee->delete();
            return response()->json(['icon' => 'Success', 'title' => 'Deleted is successfully'], 200);
        }
    }
}
