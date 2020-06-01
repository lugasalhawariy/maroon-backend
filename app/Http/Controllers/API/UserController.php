<?php

namespace App\Http\Controllers\API;

// data yang dibutuhkan
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $data['token'] =  $user->createToken('maroon')->accessToken;
            return ResponseFormatter::success($data, 'Login Berhasil');
        }
        else{
            return ResponseFormatter::error(null, 'Login Gagal', 401);
            // return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['nullable', 'string', 'max:255', 'in:USER,ADMIN,KETUA,RPK,MEDKOM'],
            'password' => ['required', 'string', 'min:8'],
            'c_password' => ['required', 'same:password'],
        ]);

        if ($validator->fails()) {
            $data['error'] = $validator->errors();
            return ResponseFormatter::error($data, 'Gagal Registrasi', 401);
            // return response()->json(['error'=> $validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $data['token'] =  $user->createToken('maroon')->accessToken;
        $data['name'] =  $user->name;

        return ResponseFormatter::success($data, 'Registrasi Berhasil');
        // return response()->json(['success'=> $success], $this->successStatus);
    }

    public function profile()
    {
        $data = Auth::user();
        
        if($data){
            return ResponseFormatter::success($data, 'Data user berhasil diambil');
        }else{
            return ResponseFormatter::error(null, 'Data user tidak ada', 404);
        }
    }
}
