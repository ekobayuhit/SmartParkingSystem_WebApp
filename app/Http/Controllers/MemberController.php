<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class MemberController extends Controller
{
  public function index() {
    $members=User::paginate(10);
    return view('member', compact('members'));
  }

  public function create() {
    return view('register_member');
  }

  public function store(Request $request){

    $this->validate($request,[
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
    ]);

    $user=User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    $user->assignRole('member');

    return redirect()->route('member_index');
  }

  //user selain admin hanya punya 1 role yaitu member
  public function destroy(User $member){
    $member->removeRole('member');
    $member->delete();
    return redirect()->back();
  }
}
