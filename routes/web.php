<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman login (menggunakan controller LoginController)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Rute untuk halaman register
Route::view('/register', 'auth.register')->name('register');

// Route setelah login, berdasarkan role (menggunakan middleware role:admin dan role:mahasiswa)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [ControllersDashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/status-pengajuan', [AdminController::class, 'statusPengajuan'])->name('admin.status-pengajuan');
    Route::post('/admin/proposals/{id}/accept', [AdminController::class, 'acceptProposal'])->name('admin.proposal.accept');
    Route::post('/admin/proposals/{id}/reject', [AdminController::class, 'rejectProposal'])->name('admin.proposal.reject');
    Route::post('/admin/proposals/{id}/revision', [AdminController::class, 'revisionProposal'])->name('admin.proposal.revision');
    
    // Manage users
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage-users');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.create-user');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.store-user');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.edit-user');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.update-user');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete-user');
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', [ControllersDashboardController::class, 'mahasiswa'])->name('mahasiswa.dashboard');
});

// Rute Auth default (seperti logout, forgot password, dll)
Auth::routes();

// Rute untuk halaman home setelah login, jika menggunakan HomeController (opsional)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute untuk profil pengguna
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

// Rute untuk halaman daftar proposal
Route::get('proposals', [ProposalController::class, 'index'])->name('proposals');

// Rute untuk proposal, termasuk CRUD dan pengajuan proposal
Route::middleware('auth')->group(function () {
    Route::get('proposals', [ProposalController::class, 'index'])->name('proposals.index');
    Route::get('proposals/create', [ProposalController::class, 'create'])->name('proposals.create');
    Route::post('proposals', [ProposalController::class, 'store'])->name('proposals.store');
    Route::get('proposals/{id}', [ProposalController::class, 'show'])->name('proposals.show');
    Route::get('proposals/{id}/edit', [ProposalController::class, 'edit'])->name('proposals.edit');
    Route::put('proposals/{id}', [ProposalController::class, 'update'])->name('proposals.update');
    Route::delete('proposals/{id}', [ProposalController::class, 'destroy'])->name('proposals.destroy');
    // Rute untuk mengajukan proposal (menggunakan POST)
    Route::post('proposals/{id}/submit', [ProposalController::class, 'submit'])->name('proposals.submit');
});
