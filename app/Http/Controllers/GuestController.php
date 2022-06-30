<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\User;

class GuestController extends Controller
{
  public function index()
  {
    return view('welcome');
  }
}
