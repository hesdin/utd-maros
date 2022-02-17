<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Hash;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();

        if ($user && Hash::check($req->password, $user->password)) {
            $token = $user->createToken('auth-user')->plainTextToken;

            $user->last_login = Carbon::now();
            $user->save();

            return response()->json([
                'message' => 'berhasil',
                'token' => $token,
            ], 200);
        }

        return response()->json([
            'message' => 'Username atau Password salah',
            'data' => $req->all()
        ], 401);
    }

    public function register(Request $req)
    {
        $file = $req->file('avatar');
        if ($file) {
            $filename = md5($req->email).'.'.$file->getClientOriginalExtension();
        }

        $u = new User();
        $u->nama = $req->nama;
        $u->jk = $req->jk;
        $u->alamat = $req->alamat;
        $u->tgl_lahir = $req->tgl_lahir;
        $u->email = $req->email;
        $u->password = bcrypt($req->password);
        if ($file) {
            $u->foto = $filename;
            $file->storeAs('avatar', $filename, 'public_uploads');
        }
        $u->save();
        return response()->json([
            'message' => 'berhasil mendaftar',
        ], 200);
    }

    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Berhasil logout'
        ], 200);
    }
}
