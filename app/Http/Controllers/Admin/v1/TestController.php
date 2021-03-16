<?php


namespace App\Http\Controllers\Admin\v1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TestController extends BaseController
{//http://leu.local/index.php/admin/v1/test
    public function ttt(Request $request){
        echo 'bb';
        return $this->uploadAvatar($request);
    }

    public function uploadAvatar(Request $request)
    {
        $avatar = $request->file('avatar')->store('/public/' . date('Y-m-d') . '/avatars');
        //上传的头像字段avatar是文件类型
        $avatar = Storage::url($avatar);//就是很简单的一个步骤

        echo $avatar;
    }
}
