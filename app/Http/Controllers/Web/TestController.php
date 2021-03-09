<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){
        return view('ttt')->render();
    }
}
