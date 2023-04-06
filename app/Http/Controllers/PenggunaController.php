<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;
class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::get()->where('jabatan', '<>', 'superadmin');
        return view('pages.pengguna.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pengguna.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
            'jabatan' => 'required',
        ]);
 
        $validatedData['password'] = Hash::make($validatedData['password']);
 
        User::create($validatedData);
        alert()->success('Berhasil','Berhasil Menambahkan Pengguna');
        return redirect('/pengguna');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = pengguna::find($id);
        $pengguna->delete();
        alert()->success('Berhasil','Berhasil Menghapus Pengguna');

        return Redirect::back();
    }
    public function login(){
        return view('pages.auth.login');
    }
    public function attemp(Request $request){
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            alert()->success('Berhasil','Berhasil Login');
            return redirect('/dashboard');
        }
    }
    public function logout(){
        Session::flush();
        
        Auth::logout();
        alert()->success('Berhasil','Berhasil Logout');
        return redirect('/');
    }
}
