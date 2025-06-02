<?php

namespace App\Http\Controllers;

use App\Models\UserAkses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class UserAksesController extends Controller
{
    // Menampilkan halaman form login
    public function showLogin()
    {
        return view('login');
    }

    // Proses login
    public function LoginProses(Request $request)
    {
        $credentials = $request->only('email','password');
        // Menggunakan Auth::attempt untuk login
        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            $auth = Auth::user();
            return redirect()->route('index')->with('success','Anda berhasil Login');
        } else {
            // Jika login gagal
            return redirect()->route('login')->with('failed', 'Masukan Username atau Password dengan benar!');
        }
    }

    // Menampilkan halaman form registrasi
    public function showRegister()
    {
        return view('register');
    }

    // Registrasi user baru
    public function RegisterProses(Request $request)
    {
        $request->validate([
            'username'      => 'required|unique:profile,username',
            'email'         => 'required|unique:profile,email',
            'password'      => 'required|min:6|confirmed',
            'nama_lengkap'  => 'required|max:100',
            'nip'           => 'required|unique:profile,nip|max:20',
            'jabatan'       => 'required|max:50',
            'alamat'        => 'nullable',
            'no_hp'         => 'required|max:12',
            'tanggal_masuk' => 'required|date',
        ]);

        UserAkses::create([
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'nama_lengkap'  => $request->nama_lengkap,
            'nip'           => $request->nip,
            'jabatan'       => $request->jabatan,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi Berhasil, Silahkan Login!');
    }

    public function index()
    {
        $auth = Auth::user();
        return view('index', compact('auth'));
    }

    public function edit()
    {
        $auth = Auth::user();
        return view('edit', compact('auth'));
    }

    public function update(Request $request)
    {
        $auth = Auth::user();
        $request->validate([
            'nama_lengkap'  => 'required|max:100',
            'nip'           => 'required|max:20',
            'jabatan'       => 'required|max:50',
            'alamat'        => 'nullable',
            'no_hp'         => 'required|max:12',
            'tanggal_masuk' => 'required|date',
        ]);

        $auth->update($request->only([
            'nama_lengkap',
            'nip',
            'jabatan',
            'alamat',
            'no_hp',
            'tanggal_masuk',
        ]));

        return redirect()->route('index')->with('success', 'Data karyawan berhasil diupdate');
    }

    public function showUpload()
    {
        $auth = Auth::user();
        return view('upload', compact('auth'));
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success','Anda berhasil Logout');
    }
}