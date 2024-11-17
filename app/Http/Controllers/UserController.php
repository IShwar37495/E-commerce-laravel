<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function signup(Request $request){
        return view('signup');
    }

  

    public function register(Request $request)
    {
        try {
            
            $validated = $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
                'phone' => 'required|digits:10',
            ]);
    
          
          $user=  User::create([
                'name' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'],
            ]);
    
           
            return response()->json([
                'success' => true,
                'message' => 'User registered successfully!',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ],
            ]);
        } catch (ValidationException $e) {
           
            return response()->json([
                'success' => false,
                'errors' => $e->errors(), 
            ], 422);
        } catch (\Exception $e) {
           
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
            ], 500);
        }
    }




    public function login(Request $request)
    {
        try {

           
           
            $validated = $request->validate([
                'email' => 'required|email|',
                'password' => 'required|string',
            ]);
    
           
         
            $user = User::where('email', $validated['email'])->first();

            if(!$user){
                return response()->json([
                    'success'=>false,
                    'message'=>'This Email address is not registered'
                ]);
            }

            if (!Hash::check($validated['password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Wrong Password',
                ], 401);
            }
          if(!$user){

            return response()->json([
                'success'=>false,
                'message'=>'Credentials do not match',
            ]);
          }
            return response()->json([
                'success' => true,
                'message' => 'User Log In successfully!',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ],
            ]);
        } catch (ValidationException $e) {
           
            return response()->json([
                'success' => false,
                'errors' => $e->errors(), 
            ], 422);
        } catch (\Exception $e) {
           
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
            ], 500);
        }
    }
    
}
