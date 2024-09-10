<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('admins.users.users',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::forUser(Auth::guard('admin')->user())->authorize('add_user');
        return view('admins.users.createUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'phone'=>'required|string',
            'address'=>'required|string',
            'password'=>'required|string|confirmed',
            'email'=>'required|unique:users,email,except,id|email',
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::forUser(Auth::guard('admin')->user())->authorize('delete_user');

        $user->delete();

        return to_route('back.users.index');

    }
}
