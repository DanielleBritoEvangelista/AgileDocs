<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        if($users->count() > 0){
            return response()->json([
                'status' => '200',
                'users' => $users
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'No users found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|max:50|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'type' => 'required|in:admin,supervisor,common',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => '422',
                'errors' => $validator->errors()
            ], 422);
        }else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> bcrypt($request->password),
                'type' => $request->type,
            ]);

            if($user){
                return response()->json([
                    'status' => '200',
                    'message' => 'User created successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => '500',
                    'message' => 'User creation failed'
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $user = User::find($id);

        if($user){
            return response()->json([
                'status' => '200',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'User not found'
            ], 404);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);

        if($user){
            return response()->json([
                'status' => '200',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'User not found'
            ], 404);
        }
    }

    public function update(Request $request,int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|max:50|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'type' => 'required|in:admin,supervisor,common',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => '422',
                'errors' => $validator->errors()
            ], 422);
        }else{
            $user = User::find($id);

            if($user){
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password'=> bcrypt($request->password),
                    'type' => $request->type,
                ]);
    
                    return response()->json([
                        'status' => '200',
                        'message' => 'User updated successfully',
                    ], 200);
            }else {
                return response()->json([
                    'status' => '500',
                    'message' => 'User update failed'
                ], 500);
            }
        }
    }
    
    // public function destroy($id)
    // {
    //     $user = User::find($id);

    //     if($user){
    //         $user->delete();

    //         return response()->json([
    //             'status' => '200',
    //             'message' => 'User deleted successfully',
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => '404',
    //             'message' => 'User deletion failed'
    //         ], 404);
    //     }
    // }
}
