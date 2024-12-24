<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'pending')->get();
        return view('admin.dashboard', compact('users'));
    }

    public function approve(User $user)
    {
        $user->update(['status' => 'approved']);
        return back()->with('success', 'User approved successfully.');
    }

    public function reject(User $user)
    {
        $user->update(['status' => 'rejected']);
        return back()->with('success', 'User rejected successfully.');
    }
}
