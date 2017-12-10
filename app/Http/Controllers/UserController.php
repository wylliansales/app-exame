<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()){
            $errors = $validator->errors();
            return view('auth.register', compact('errors'));
        }
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return view('home');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user){
            $user->delete();
            return response()->json([],204);
        } else {
            return response()->json(['message'=>'Usuário não encontrado'],404);
        }
    }


}
