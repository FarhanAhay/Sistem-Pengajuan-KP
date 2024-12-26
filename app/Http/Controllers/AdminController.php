<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Fungsi untuk dashboard Admin
    public function dashboard()
    {
        return view('admin.dashboard'); // Ganti dengan nama view yang sesuai
    }

    // Menampilkan daftar proposal yang diajukan oleh mahasiswa
    public function statusPengajuan()
    {
        $proposals = Proposal::all(); // Menampilkan semua proposal
        return view('admin.status-pengajuan', compact('proposals'));
    }

    // Menerima proposal
    public function acceptProposal($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->status = 'accepted';  // Ubah status menjadi diterima
        $proposal->save();

        return redirect()->route('admin.status-pengajuan')->with('success', 'Proposal accepted.');
    }

    // Menolak proposal
    public function rejectProposal($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->status = 'rejected';  // Ubah status menjadi ditolak
        $proposal->save();

        return redirect()->route('admin.status-pengajuan')->with('success', 'Proposal rejected.');
    }

    // Revisi proposal
    public function revisionProposal($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->status = 'revision';  // Ubah status menjadi revisi
        $proposal->save();

        return redirect()->route('admin.status-pengajuan')->with('success', 'Proposal needs revision.');
    }

    // Menampilkan daftar pengguna
    public function manageUsers()
    {
        $users = User::all(); // Ambil semua pengguna
        return view('admin.manage-users', compact('users'));
    }

    // Menampilkan form untuk membuat pengguna
    public function createUser()
    {
        return view('admin.create-user');
    }

    // Menyimpan pengguna baru
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.manage-users')->with('success', 'User created successfully.');
    }

    // Menampilkan form untuk mengedit pengguna
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    // Memperbarui pengguna
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('admin.manage-users')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manage-users')->with('success', 'User deleted successfully.');
    }
    
}
