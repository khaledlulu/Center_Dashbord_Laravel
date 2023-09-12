<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Studant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class APIAuthUserController extends Controller
{
    //       Register Function
    public function Register(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'string',
        ]);
        if (!$validator->fails()) {
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            $isSaved = $admins->save();
            if ($isSaved) {
                return response()->json([
                    'status' => true,
                    'message' => 'Created is Successfully',
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
                'message' => $validator->getMessageBag()->first()
            ], 400);
        }
    }



    //       ResetPassword Function
    public function ResetPassword(Request $request)
    {
    }

    //       ShowLogin Function
    public function ForgetPassword(Request $request)
    {
    }




    public function LoginAdmin(Request $request)
    {
        // Define the validation rules once
        $rules = [
            'email' => 'required|string|exists:admins,email',
            'password' => 'required|string',
        ];

        $validator = validator($request->all(), $rules);
        if (!$validator->fails()) {
            if (Auth::guard('admin')) {
                $admins = Admin::where('email', $request->get('email'))->first();
                if ($admins && Hash::check($request->get('password'), $admins->password)) {
                    $token = $admins->createToken('admin_api');
                    $admins->setAttribute('token', $token->accessToken);
                    return $token;
                    return response()->json([
                        'status' => true,
                        'message' => 'login Admin is success',

                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'login Admin is faild',

                    ], 400);
                }
            }
        } else {
            return response()->json([
                'status' => false,
                'messege' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    //       LogOut Admin Function
    public function LogOutAdmin(Request $request)
    {
        $admins = $request->user('admin-api');
        $token = $admins->token();
        $revoked = $token->revoke();

        return response()->json([
            'status' => $revoked,
            'message' => $revoked ? 'Logout is success' : 'Logout is failed',
        ]);
    }

    public function loginEmployee(Request $request)
    {
        // Define the validation rules once
        $rules = [
            'email' => 'required|string|exists:employees,email',
            'password' => 'required|string',
        ];

        $validator = validator($request->all(), $rules);
        if (!$validator->fails()) {
            if (Auth::guard('employee')) {
                $employees = Employee::where('email', $request->get('email'))->first();
                if ($employees && Hash::check($request->get('password'), $employees->password)) {
                    $token = $employees->createToken('employee_api');
                    $employees->setAttribute('token', $token->accessToken);
                    return $token;
                    return response()->json([
                        'status' => true,
                        'message' => 'login Employee is success',

                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'login Employee is faild',

                    ], 400);
                }
            }
        } else {
            return response()->json([
                'status' => false,
                'messege' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    //       LogOutEmployee Function
    public function LogOutEmployee(Request $request)
    {
        $employees = $request->user('employee-api');
        $token = $employees->token();
        $revoked = $token->revoke();

        return response()->json([
            'status' => $revoked,
            'message' => $revoked ? 'Logout is success' : 'Logout is failed',
        ]);
    }

    public function loginStudant(Request $request)
    {
        // Define the validation rules once
        $rules = [
            'email' => 'required|string|exists:studants,email',
            'password' => 'required|string',
        ];

        $validator = validator($request->all(), $rules);
        if (!$validator->fails()) {
            if (Auth::guard('studant')) {
                $studants = Studant::where('email', $request->get('email'))->first();
                if ($studants && Hash::check($request->get('password'), $studants->password)) {
                    $token = $studants->createToken('studant_api');
                    $studants->setAttribute('token', $token->accessToken);
                    return $token;
                    return response()->json([
                        'status' => true,
                        'message' => 'login Studant is success',

                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'login Studant is faild',

                    ], 400);
                }
            }
        } else {
            return response()->json([
                'status' => false,
                'messege' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    //       LogOut Studant Function
    public function LogOutStudant(Request $request)
    {
        $studants = $request->user('studant-api');
        $token = $studants->token();
        $revoked = $token->revoke();

        return response()->json([
            'status' => $revoked,
            'message' => $revoked ? 'Logout is success' : 'Logout is failed',
        ]);
    }
}
