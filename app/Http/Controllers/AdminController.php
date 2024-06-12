<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function listUsers()
    {
        $users = User::where('role', 'pengguna')->with('wallet')->get();
        return view('admin.users.index', compact('users'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return Redirect::route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
