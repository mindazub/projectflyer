<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
   public function index()
   {
   		$users = User::all();

   		return view('users.index', compact('users'));
   }
}
