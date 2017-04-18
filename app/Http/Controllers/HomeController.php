<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Branch;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Riesenia\Kendo\Kendo;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // status - 1 (Tentative), 2 (Confirmed)
        //$bookings = Booking::where('status_id', 1)->orderBy('event_date_time')->orderBy('status_id')->paginate(20);
        $bookings = Booking::orderBy('event_date_time', "desc")->orderBy('status_id')->paginate(20);
        return view('home', compact('bookings'));
    }

    public function registerUser()
    {
        $branches = Branch::orderBy('name', 'asc')->lists('name', 'id');

        return view('register_user', compact('branches'));
    }

    public function postRegisterUser(UserRequest $request)
    {
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());

        return view('home');
    }

    public function listUser()
    {
        $user = Auth::user();

        if($user->isSystemAdmin())
            $users = User::paginate(10);
        elseif($user->isBranchAdmin())
            $users = User::where('user_type', 'staff')->where('branch_id', $user->branch_id)->paginate(10);

        return view('list_user', compact('users'));
    }

    public function editUser($id)
    {
        $branches = Branch::orderBy('name', 'asc')->lists('name', 'id');
        $user = User::findOrFail($id);

        return view('edit_user', compact('branches', 'user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $request['password'] = bcrypt($request['password']);
        $user->update($request->all());

        $request->session()->flash('alert-success', 'User profile was updated successfully!');

        return redirect('/list-user');
    }
}
