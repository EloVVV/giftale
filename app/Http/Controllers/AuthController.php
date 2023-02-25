<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function reg(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:users,name',
            'password' => 'required|min:6|same:re_password',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $user = User::query()->create(
            ['password' => Hash::make($request['password'])] + $validator->validated()
        );

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function auth(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'password' => 'required|min:6'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $credentials = $request->only('name', 'password');
//        dd(Auth::attempt($credentials));

//        dd(Hash::check($credentials['password'], User::query()->where('name', '=', $credentials['name'])->first()['password']));
        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['invalid' => 'Invalid credentials'])
                ->withInput($request->all());
        }
//        if(Auth::user()->role === 'banned') {
//            Auth::logout();
//
//            return redirect()->route('blocked');
//        }

        return redirect()->route('home');
    }
}
