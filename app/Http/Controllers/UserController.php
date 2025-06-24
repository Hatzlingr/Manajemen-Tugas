<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;


use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'menuAdminUser' => 'active',
            'title' => 'Data User',
            'user' => User::orderBy('jabatan', 'asc')->get(),
        );
        return view('admin/user/index', $data);
    }

    public function create()
    {
        $data = array(
            'menuAdminUser' => 'active',
            'title' => 'Tambah Data User'
        );
        return view('admin/user/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'jabatan' => 'required',

        ], [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah ada',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Password tidak sama',
            'password.min' => 'Password minimal 8 karakter',
            'jabatan.required' => 'Jabatan harus diisi'
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        $user->password = Hash::make($request->password);
        $user->is_tugas = false;
        $user->save();

        return redirect()->route('user')->with('success', 'Data user berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = array(
            'menuAdminUser' => 'active',
            'title' => 'Edit Data User',
            'user' => User::findOrFail($id)
        );
        return view('admin/user/edit', $data);
    }

        public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,

            'password' => 'nullable|min:8|confirmed',
            'jabatan' => 'required',

        ], [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah ada',
            'password.confirmed' => 'Password tidak sama',
            'password.min' => 'Password minimal 8 karakter',
            'jabatan.required' => 'Jabatan harus diisi'
        ]);

        $user = User::findOrFail($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->is_tugas = false;
        $user->save();

        return redirect()->route('user')->with('success', 'Data user berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Data user berhasil dihapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-y_H-i-s');
        return Excel::download(new UsersExport, 'Data User_' . $filename . '.xlsx');
    }
}
