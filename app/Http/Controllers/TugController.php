<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tug;

class TugController extends Controller
{
    public function index(Tug $tug)
    {
        return view('tugs.index')->with(['posts' => $tugs->getByTug()]);
    }
}
