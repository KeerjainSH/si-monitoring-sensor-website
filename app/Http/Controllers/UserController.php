<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'ASC')->paginate(5);
        $id = Auth::id();
        $loggedin = User::find($id);
        if ($loggedin->level == 'user')
            return redirect('dashboard');
        return view('user', ['users' => $users, 'loggedin' => $loggedin]);
    }
}
