<?php


namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;

class TestController extends Controller
{//http://leu.local/index.php/api/v1/tt
    public function index(){
        echo 'api-test-v1';
    }
}
