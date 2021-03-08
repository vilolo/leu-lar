<?php


namespace App\Http\Controllers\Admin\v1;


use App\Http\Controllers\Controller;

class TestController extends Controller
{//http://leu.local/index.php/admin/v1/tt
    public function testLogin(){
        echo 'admin-v1-test-login';
    }

    public function testNoLogin(){
        echo 'admin-v1-test-nologin';
    }
}
