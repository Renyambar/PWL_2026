<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Praktikum 1: insert data baru menggunakan Mass Assignment (create)
        $data = [
            'level_id'  => 2,
            'username'  => 'manager22',
            'nama'      => 'Manager Dua',
            'password'  => Hash::make('12345'),
        ];
        UserModel::create($data);

        // ambil semua data user dari tabel m_user
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
