<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::with('user')->orderBy('id', 'asc')->paginate(7);
        // $this->authorize('view', Admin::class);
        return response()->view('dashbord.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name', 'admin')->get();
        // $this->authorize('create', Admin::class);
        return response()->view('dashbord.admin.create', compact('cities', 'roles'));
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
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/admin', $imageName);
                $admins->image = $imageName;
            }
            if (request()->hasFile('cv')) {
                $cv = $request->file('cv');
                $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                $cv->move('storage/files/admin', $fileName);
                $admins->cv = $fileName;
            }
            //image / cv
            $isSaved = $admins->save();
            if ($isSaved) {
                $users = new User();
                $roles = Role::findOrFail($request->get('role_id'));
                $admins->assignRole($roles->name);
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
        $admins = Admin::findOrFail($id);
        $cities = City::all();
        return response()->view('dashbord.admin.show', compact('admins', 'cities'));
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
        $admins = Admin::with('user')->findOrFail($id);
        // $this->authorize('update', Admin::class);
        return response()->view('dashbord.admin.edit', compact('cities', 'admins'));
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
                $users->salary_type = $request->get("salary_type");
                $users->salary_value = $request->get("salary_value");
                $users->currancy = $request->get("currancy");
                $users->certification = $request->get("certification");
                $users->job_title = $request->get("job_title");
                $users->cities_id = $request->get("cities_id");
                $users->actor()->associate($admins);
                $isUpdate = $users->save();
                return ['redirect' => route('admins.index')];
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
    public function destroy(Admin $admin)
    {
        // $this->authorize('delete', Admin::class);
        // $admins = Admin::destroy($id);

        //  الي مسجل دخول للنظام admin هان بيخليه ما يقدر يحذف نفسه ال

        if ($admin->id == Auth::id()) {
            return redirect(route('admins.index'))->withErrors(trans('Cannot Delete Yourslef'));
        } else {
            $admin->user()->delete();
            $isdeleted = $admin->delete();
            return response()->json(['icon' => 'Success', 'title' => 'Deleted is successfully'], 200);
        }
    }
}
