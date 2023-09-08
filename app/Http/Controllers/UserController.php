<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $data = User::all();
        return view('page.User.table', compact('data'));
    }

    public function create_user()
    {
        return view('page.user.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|min:8'
        ]);

        $hashedPassword = Hash::make($request->input('password'));
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => $hashedPassword,
        ]);

        return redirect()->route('user')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        return view('page.User.edit', compact('user'));
    }

    public function update_user(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'nullable|min:8',
        ]);

        $user = User::findOrFail($id);

        // Validasi password lama
        if ($request->has('password')) {
            if (Hash::check($request->input('old_password'), $user->password)) {
                // Password lama sesuai, lanjutkan pembaruan password
                $hashedPassword = Hash::make($request->input('password'));
                $user->password = $hashedPassword;
            } else {
                return redirect()->back()->with('error', 'Password lama salah.');
            }
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        $user->save();

        return redirect()->route('user')->with('success', 'Data berhasil diperbarui');
    }

    public function hapus_user($id)
    {
        $user = User::find($id);

        if ($user === null) {
            return redirect()->route('user')->with('error', 'Data pengguna tidak ditemukan.');
        }

        // Periksa apakah pengguna yang sedang masuk mencoba menghapus akunnya sendiri
        if (auth()->user() && $user->id === auth()->user()->id) {
            return redirect()->route('user')->with('error', 'Anda tidak dapat menghapus akun yang sedang digunakan.');
        }

        $user->delete();
        return redirect()->route('user')->with('success', 'Data ' . $user->name . ' berhasil dihapus');
    }

    public function detail_user($id)
    {
        $user = User::findOrFail($id);
        return view('page.user.detail', compact('user'));
    }

    public function liveSearch(Request $request)
    {
        $query = $request->input('query');

        // Perform a database query to search for users based on the $query
        $results = User::where('name', 'LIKE', '%' . $query . '%')->get();

        // You can also add more search criteria as needed

        return response()->json($results);
    }
}
