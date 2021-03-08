<?php


namespace App\Http\Controllers\Admin\v1;


use App\Tools\Utils;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function login(Request $request)
    {
        Utils::validator($request,[
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
        ]);

//        if (! $token = auth()->attempt([
//            'username' => $request->username,
//            'password' => $request->password,
//        ])) {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }

        if (!auth('admin')->validate([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user_info = auth()->user();
        unset($user_info['password']); // 去掉存储的密码

        return response()->json([
            'code'=>200,
            'token' => $token,
            'token_type' => 'bearer',
            'user_info' => $user_info,
        ]);

    }
}
