<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class QuickWInController extends Controller
{
    public function index()
{
    $quickwins = QuickWin::all();
    return view('welcome', compact('quickwins'));
}
}
