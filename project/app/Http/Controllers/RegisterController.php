<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;

class RegisterController extends BaseController
{
    public function register(Request $request): JsonResponse
    {
        $input = $request->all();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        $customMessages = [
            'name.max' => 'Name must not exceed 255 characters',
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email has already been taken',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters long',
            'password.confirmed' => 'Password and Confirm Password must match',
        ];

        $validator = Validator::make($input, $rules, $customMessages);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User registered successfully.');
    }

    public function login(Request $request): JsonResponse
    {
        $input = $request->all();

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'email.email' => 'Email must be a valid email address',
        ];

        $validator = Validator::make($input, $rules, $customMessages);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Wrong email or password!', ['error' => 'Unauthorised'], 401);
        }
    }
    
    public function index()
    {
        $users = User::all();

        return $this->sendResponse(UserResource::collection($users), 'Users retrieved successfully');
    }

    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        return $this->sendResponse(new UserResource($user), 'User retrieved successfully.');
    }

    /** 
     * Update the specified resource in storage.
     * 
     * 
     */
    public function update(Request $request, User $user): JsonResponse
    {
        $input = $request->all();

        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Name is required',
            'name.max' => 'Name must not exceed 100 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'password.required' => 'Password is required',
        ];

        $validator = Validator::make($input, $rules, $customMessages);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);

        $user->save();

        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
    }

    public function destroy($id): JsonResponse
    {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError([], 'User not found.');
        }

        $user->delete();

        return $this->sendResponse([], 'User deleted successfully.');
        
    }
}
