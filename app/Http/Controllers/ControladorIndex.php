<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorIndex extends Controller
{
public function home(){
    return redirect()->route("principales.index");
}
}
