<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index()
  {
      phpinfo();
      echo date('Y-m-d H:i:s');
      return view('index');
  }
}
