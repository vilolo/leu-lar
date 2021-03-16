<?php


namespace App\Http\Controllers\Admin\v1;


use App\Tools\Utils;
use Illuminate\Http\Request;

class NavigationController extends BaseController
{
    public function add(Request $request)
    {
        return Utils::resOk('', ['a'=> 'aaa']);
    }
}
