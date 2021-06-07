<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
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
    public function index(Request $request)
    {
        $id = Auth::id();
        $loggedin = User::find($id);
        if ($loggedin->level == 'user')
            return redirect('dashboard');

        $user = User::find($request->input('id')) ;
        $user->delete();
        return redirect('user') ;
    }
}
