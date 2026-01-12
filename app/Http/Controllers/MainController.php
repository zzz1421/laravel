<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // 나중에는 여기서 Notice::latest()->take(5)->get() 처럼 데이터를 가져옵니다.
        return view('main'); // 'resources/views/main.blade.php'를 보여줘라!
    }
}