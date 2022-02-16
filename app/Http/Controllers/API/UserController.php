<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Chat;
use App\Models\golongan;
use App\Models\Jadwal;
use App\Models\stok;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function stok()
    {
        $g = golongan::orderBy('nm_golongan')->distinct()->get(['id', 'nm_golongan', 'resus_golongan']);

        return response()->json([
            'golongan' => $g,
        ], 200);
    }

    public function stokDetail($golongan)
    {
        $s = stok::where('golongan_id', $golongan)->with('tipe')->orderBy('tipe_id')->get();

        return response()->json([
            'stok' => $s,
        ], 200);
    }

    public function jadwal()
    {
        $j = Jadwal::where('tgl', '>=', Carbon::today())->orderBy('tgl')->get();

        return response()->json([
            'jadwal' => $j,
        ], 200);
    }

    public function chat()
    {
        $admins = Admin::orderBy('name')->get();
        return response()->json([
            'admins' => $admins,
        ], 200);
    }

    public function chatSend(Request $req)
    {
        $a = new Chat();
        $a->pesan = $req->pesan;
        $a->user = $req->user;
        $a->admin = $req->admin;
        $a->pengirim = $req->pengirim;

        if ($a->save()) {
            return response()->json([
                'message' => 'berhasil',
            ], 200);
        }

        return response()->json([
            'message' => 'gagal',
        ], 500);

    }

    public function chatData($user, $admin)
    {
        $chat = Chat::where('user', $user)->where('admin', $admin)->orderBy('created_at', 'DESC')->get();

        return response()->json([
            'chat' => $chat,
        ], 200);
    }

    public function newPassword(Request $req)
    {
        $req->user()->password = bcrypt($req->password);
        $req->user()->save();

        return response()->json([
            'message' => 'berhasil',
        ], 200);
    }
}
