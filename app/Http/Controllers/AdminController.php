<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\golongan;
use App\Models\Jadwal;
use App\Models\Pendonor;
use App\Models\stok;
use App\Models\tipe;
use App\Models\User;

class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('admin.dashboard');
    }

    public function dataMaster()
    {
        return view('admin.data-master');
    }

    // GOLONGAN DARAH

    public function golongan()
    {
        $data = golongan::orderBy('nm_golongan')->orderBy('resus_golongan', 'DESC')->get();

        return view('admin.golongan', ['data' => $data]);
    }

    public function golonganTambah(Request $request)
    {

        $golonganDarah = new golongan();

        $golonganDarah->nm_golongan = strtoupper($request->nama);
        $golonganDarah->resus_golongan = $request->resus;

        $golonganDarah->save();

        return back()->with('success', 'BERHASIL DITAMBAHKAN');
    }

    public function golonganHapus($id)
    {
        $golonganDarah = golongan::findOrFail($id);

        $golonganDarah->delete();

        return back()->with('success', 'BERHASIL DIHAPUS');
    }

    // TIPE GOLONGAN DARAH

    public function tipeGolongan()
    {
        $tipeGolongan = tipe::all();

        return view('admin.tipe-golongan', ['data' => $tipeGolongan]);
    }

    public function tipeGolonganTambah(Request $request)
    {
        $tGDarah = new tipe();

        $tGDarah->nm_type = $request->nama;
        $tGDarah->skt_type = $request->singkatan;

        $tGDarah->save();

        return back()->with('success', 'BERHASIL DITAMBAHKAN');
    }

    public function tipeGolonganHapus($id)
    {
        $tGDarah = tipe::findOrFail($id);

        $tGDarah->delete();

        return back()->with('success', 'BERHASIL DIHAPUS');
    }

    // STOK DARAH

    public function stokDarah()
    {
        $sDarah = stok::all();
        $gDarah = golongan::all();
        $tGDarah = tipe::all();

        $data = [
            'daftarSDarah' => $sDarah,
            'daftarGDarah' => $gDarah,
            'daftarTGDarah' => $tGDarah,
        ];

        return view('admin.stok-darah', $data);
    }

    public function stokDarahTambah(Request $request)
    {
        $sDarah = new stok();

        $sDarah->golongan_id = $request->golongan;
        $sDarah->tipe_id = $request->tipe;
        $sDarah->jumlah = $request->jumlah;

        $sDarah->save();

        return back()->with('success', 'BERHASIL DITAMBAHKAN');
    }

    public function stokDarahEdit($id)
    {
        $sDarah = stok::findOrFail($id);
        $gDarah = golongan::all();
        $tGDarah = tipe::all();

        $data = [
            'sDarah' => $sDarah,
            'daftarGDarah' => $gDarah,
            'daftarTGDarah' => $tGDarah,
        ];

        return view('admin.stok-darah-edit', $data);
    }

    public function stokDarahUpdate(Request $request, $id)
    {
        $sDarah = stok::findOrFail($id);

        $sDarah->golongan_id = $request->golongan;
        $sDarah->tipe_id = $request->tipe;
        $sDarah->jumlah = $request->jumlah;

        $sDarah->update();

        return redirect()->route('stok.darah')->with('success', 'BERHASIL DIUPDATE');
    }

    public function stokDarahHapus($id)
    {
        $sDarah = stok::findOrFail($id);

        $sDarah->delete();

        return back()->with('success', 'BERHASIL DIHAPUS');
    }

    // DATA PENDONOR

    public function dataPendonor()
    {
        $dPendonor = Pendonor::all();

        return view('admin.data-pendonor', ['dPendonor' => $dPendonor]);
    }

    public function dataPendonorHapus($id)
    {
        $pendonor = Pendonor::findOrFail($id);

        $pendonor->delete();

        return back()->with('success', 'BERHASIL DIHAPUS');
    }

    public function jadwalDonor()
    {
        $jDonor = Jadwal::all();

        return view('admin.jadwal-donor', ['jDonor' => $jDonor]);
    }

    public function jadwalDonorTambah(Request $request)
    {
        // dd($request->all());
        $jDonor = new Jadwal();

        $jDonor->tgl = $request->tgl;
        $jDonor->mulai = $request->mulai;
        $jDonor->selesai = $request->selesai;
        $jDonor->pelaksana = $request->pelaksana;
        $jDonor->alamat = $request->alamat;

        $jDonor->save();

        return back()->with('success', 'BERHASIL DITAMBAHKAN');
    }

    public function jadwalDonorHapus($id)
    {
        $jDonor = Jadwal::findOrFail($id);

        $jDonor->delete();

        return back()->with('success', 'BERHASIL DIHAPUS');
    }

    // MANAJEMEN USER

    public function manajemenUser()
    {
        $users = User::all();

        return view('admin.manajemen-user', ['users' => $users]);
    }

    public function manajemenUserEdit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.manajemen-user-edit', ['user' => $user]);
    }

    public function manajemenUserUpdate(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);

        $user->nama = $request->nama;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->jk = $request->jk;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->password = bcrypt($request->pass);


        if ($request->hasFile('foto')) {
            $destination = public_path('assets/images/profiles/' . $user->foto);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $foto = $request->file('foto');
            $extention = $foto->getClientOriginalExtension();
            $namaFoto = time() . '-' . $request->nama . '.' . $extention;
            $foto->move(public_path('assets/images/profiles'), $namaFoto);

            $user->foto = $namaFoto;
        }

        $save = $user->update();

        if ($save) {
            return redirect()->route('manajemen.user')->with('success', 'BERHASIL DIUPDATE');
        }
    }

    public function manajemenUserHapus($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('success', 'BERHASIL DIHAPUS');
    }
}
