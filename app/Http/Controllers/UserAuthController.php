<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Employee;
use App\Models\Studant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    //          {show Login Function}

    public function showLogin($guard)
    {
        return response()->view('dashbord.auth.login', compact('guard'));
    }

    //               {Login Function}

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
            // 'guard' => 'required|string|in:admin'
        ], [
            'email.required' => 'رجاء, أدخل البريد الإلكتروني',
            'email.email' => 'البريد الإلكتروني المدخل غير صحيح',
            'password.required' => 'رجاء, أدخل كلمة المرور',
            'guard.in' => 'تأكد من صحة رابط صفحة تسجيل الدخول'
        ]);

        $credenials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            // 'remember' => $request->get('remember'),

        ];

        if (!$validator->fails()) {
            if (Auth::guard($request->get('guard'))->attempt($credenials)) {
                return response()->json(['icon' => 'success', 'title' => 'Login sucssefully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Login is Failed'], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    //                  {Logout Function}

    public function logout(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'employee';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('login.view', $guard);
    }


    //              {EditProfile Function}

    public function EditProfile(Request $request)
    {
        $cities = City::all();
        if (auth('admin')->check()) {


            $admins = Admin::findOrFail(Auth::guard('admin')->id());
            return response()->view('dashbord.auth.editprofileAdmin', compact('cities', 'admins'));
        } elseif (auth('employee')->check()) {

            $employees = Employee::findOrFail(Auth::guard('employee')->id());
            return response()->view('dashbord.auth.editprofileEmployee', compact('cities', 'employees'));
        } elseif (auth('studant')->check()) {

            $studants = Studant::findOrFail(Auth::guard('studant')->id());
            return response()->view('dashbord.auth.editprofileStudant', compact('cities', 'studants'));
        }
    }


    //                {UpdateProfile Function}

    public function UpdateProfile(Request $request)
    {
        $validator = validator($request->all(), [
            // 'image' => "required|image|max:2048|mimes:png,jpg,jpeg,pdf",
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
        ], []);

        if (!$validator->fails()) {

            // {Admin Update Profile}
            if (auth('admin')->check()) {
                $admins = Admin::findOrFail(Auth::guard('admin')->id());
                $admins->email = $request->get('email');
                // $admins->password = Hash::make($request->get('password'));

                $isSaved = $admins->save();
                if ($isSaved) {
                    $users = $admins->user;
                    if (request()->hasFile('image')) {
                        $image = $request->file('image');
                        $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                        $image->move('storage/images/admin', $imageName);
                        $users->image = $imageName;
                    }
                    if (request()->hasFile('cv')) {
                        $cv = $request->file('cv');
                        $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                        $cv->move('storage/files/admin', $fileName);
                        $users->cv = $fileName;
                    }
                    $users->first_name = $request->get('first_name');
                    $users->last_name = $request->get('last_name');
                    $users->mobile = $request->get(' mobile');
                    $users->status = $request->get('status');
                    $users->gender = $request->get('gender');
                    $users->birth_date = $request->get('birth_date');
                    $users->country_id = $request->get('country_id');
                    $users->actor()->associate($admins);
                    $isSaved = $users->save();
                    return ['redirect' => route('admins.index')];

                    return response()->json(['icon' => 'success', 'title' => 'Update is successfully'], 200);
                } else {
                    return response()->json(['icon' => 'error', 'title' => 'Update is falid'], 400);
                }
            }

            // {Employee Update Profile}

            elseif (auth('employee')->check()) {
                $employees = Employee::findOrFail(Auth::guard('employee')->id());
                $employees->email = $request->get('email');
                // $employees->password = Hash::make($request->get('password'));

                $isSaved = $employees->save();
                if ($isSaved) {
                    $users = $employees->user;
                    if (request()->hasFile('image')) {
                        $image = $request->file('image');
                        $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                        $image->move('storage/images/employee', $imageName);
                        $users->image = $imageName;
                    }
                    if (request()->hasFile('cv')) {
                        $cv = $request->file('cv');
                        $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                        $cv->move('storage/files/employee', $fileName);
                        $users->cv = $fileName;
                    }
                    $users->first_name = $request->get('first_name');
                    $users->last_name = $request->get('last_name');
                    $users->mobile = $request->get(' mobile');
                    $users->status = $request->get('status');
                    $users->gender = $request->get('gender');
                    $users->birth_date = $request->get('birth_date');
                    $users->country_id = $request->get('country_id');
                    $users->actor()->associate($employees);
                    $isSaved = $users->save();
                    return ['redirect' => route('employees.index')];

                    return response()->json(['icon' => 'success', 'title' => 'Update is successfully'], 200);
                } else {
                    return response()->json(['icon' => 'error', 'title' => 'Update is falid'], 400);
                }
            }

            // { Studant Update Profile}

            elseif (auth('studant')->check()) {
                $studants = Studant::findOrFail(Auth::guard('studant')->id());
                $studants->email = $request->get('email');
                // $employees->password = Hash::make($request->get('password'));

                $isSaved = $studants->save();
                if ($isSaved) {
                    $users = $studants->user;
                    if (request()->hasFile('image')) {
                        $image = $request->file('image');
                        $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                        $image->move('storage/images/studant', $imageName);
                        $users->image = $imageName;
                    }
                    if (request()->hasFile('cv')) {
                        $cv = $request->file('cv');
                        $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();
                        $cv->move('storage/files/studant', $fileName);
                        $users->cv = $fileName;
                    }
                    $users->first_name = $request->get('first_name');
                    $users->last_name = $request->get('last_name');
                    $users->mobile = $request->get(' mobile');
                    $users->status = $request->get('status');
                    $users->gender = $request->get('gender');
                    $users->birth_date = $request->get('birth_date');
                    $users->country_id = $request->get('country_id');
                    $users->actor()->associate($studants);
                    $isSaved = $users->save();
                    return ['redirect' => route('studants.index')];

                    return response()->json(['icon' => 'success', 'title' => 'Update is successfully'], 200);
                } else {
                    return response()->json(['icon' => 'error', 'title' => 'Update is falid'], 400);
                }
            }
        } else {
            return response()->json([
                'icon' => 'error', 'title' => $validator->getMessageBag()->first()
            ], 400);
        }
    }

    //                  { Function show Change Password Blade Page}
    public function ChangePassword()
    {
        return response()->view('dashbord.auth.changePassword');
    }


    //                 {Update Change Password Function}
    public function updatePassword(Request $request)
    {

        $validator = Validator($request->all(), [
            'password' => 'required|string|min:3',
            'new_password' => 'required|string|confirmed',
            'new_password_confirmation' => 'required|string'

        ]);
        if (!$validator->fails()) {

            //      {Admin Update Password}
            if (auth('admin')->check()) {
                $admins = auth('admin')->user();
                $admins->password = Hash::make($request->get('new_password'));
                $isSaved = $admins->save();
                if ($isSaved) {

                    return response()->json([
                        'icon' => 'success',
                        'title' => 'change your password is successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'icon' => 'error',
                        'title' => 'change your password is failed'
                    ], 400);
                }
            }
            //      {Employee Update Password}
            if (auth('employee')->check()) {
                $employee = auth('employee')->user();
                $employee->password = Hash::make($request->get('new_password'));
                $isSaved = $employee->save();
                if ($isSaved) {

                    return response()->json([
                        'icon' => 'success',
                        'title' => 'change your password is successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'icon' => 'error',
                        'title' => 'change your password is failed'
                    ], 400);
                }
            }
            //      {Studant Update Password}
            if (auth('studant')->check()) {
                $studants = auth('studant')->user();
                $studants->password = Hash::make($request->get('new_password'));
                $isSaved = $studants->save();
                if ($isSaved) {

                    return response()->json([
                        'icon' => 'success',
                        'title' => 'change your password is successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'icon' => 'error',
                        'title' => 'change your password is failed'
                    ], 400);
                }
            }
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first()
            ], 400);
        }
    }
}
