<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::all();
        $id = Auth::id();
        return view('user.user', compact('users', 'id'));
    }    

    public function edit($user_id) {
        $user = User::find($user_id);
        return view('user.edit', compact('user'));
    }

    public function update($user_id, Request $request) {
        $user = User::find($user_id);
        $user->update($request->all());
        return redirect()->route('user');
    }

    public function destroy($user_id) {
        $user = User::find($user_id);
        $user->delete();

        return redirect()->route('user');
    }
}
