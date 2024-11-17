<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return 'hello';
}
);

Route::get('/login', function(){
    return view('login');
});

Route::post('/login', function(Request $request){

    $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:8',
    ]);

    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password
    ]);

    return redirect()->back()->with('success', 'User registered successfully!');
})->name('submit');


Route::get('/users',function(){
  $user=  User::all();

  return view('allusers', compact('user'));


})->name('userList');


Route::get('/signup', [UserController::class, 'signup'])->name('signup');

Route::post('/signup', [UserController::class, 'register'])->name('register');

Route::post('/login', [UserController::class, 'login'])->name('login');
