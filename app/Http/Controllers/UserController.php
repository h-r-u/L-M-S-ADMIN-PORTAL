<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Educator;

class UserController extends Controller
{
  public function index (String $string) {
    $user[] = 'user';
    $user['title'] = $string;
    $user['administrator'] = User::all();
    $user['educator'] = Educator::all();
    $user['parent'] = User::all();
    $user['student'] = User::all();

    return view('user.index', compact('user'));
  }

  public function show (String $id) {
    $user[] = 'user';
    $user['title'] = $id;
    $user = User::findOrFail($id);
    

    return view('user.section.show', compact('user'));
  }
}
