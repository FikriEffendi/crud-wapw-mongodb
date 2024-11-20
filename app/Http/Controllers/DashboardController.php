<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dashboards = Dashboard::get();

        $view_data = [
            'dashboards' => $dashboards,
        ];

        return view('dashboard.dashboard', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dashboards,email',
            'password' => 'required|min:6',
            'role' => 'required|string',
        ]);

        //simpan data ke MongoDB
        Dashboard::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), //enkripsi password
            'role' => $validated['role'],
        ]);

        //redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('dashboard.index')->with('success', 'Akun berhasil dibuat');
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
        $dashboard = Dashboard::findOrFail($id);

        $view_data = [
            'dashboard' => $dashboard,
        ];

        return view('dashboard.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama = $request->nama;
        $email = $request->email;
        $role = $request->role;

        Dashboard::findOrFail($id)->update([
            'nama' => $nama,
            'email' => $email,
            'role' => $role,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dashboard::findOrFail($id)->delete();

        return redirect()->route('dashboard.index')->with('success', 'delete success');
    }
}
