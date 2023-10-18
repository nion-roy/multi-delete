<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
  public function index()
  {
    $users = User::latest()->get();
    return view('welcome', compact('users'));
  }


  public function userSelectedDelete(Request $request)
  {

    // return $request;

    $ids = $request->ids;
    User::whereIn('id', $ids)->delete();
    Session::flash('message', 'Selected Value Delete Successfully!');
    return redirect()->back();
  }

  public function destroy(string $id)
  {
    User::findOrFail($id)->delete();
    Session::flash('message', 'User Delete Successfully!');
    return redirect()->back();
  }
}
