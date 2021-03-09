<?php


namespace App\Http\Controllers\Admin\v1;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * Create a new AuthController instance.
     * 要求附带email和password（数据来源users表）
     * @return void
     */
    public function __construct()
    {
        // 这里额外注意了：官方文档样例中只除外了『login』
        // 这样的结果是，token 只能在有效期以内进行刷新，过期无法刷新
        // 如果把 refresh 也放进去，token 即使过期但仍在刷新期以内也可刷新
        // 不过刷新一次作废
//        $this->middleware('auth:admin', ['except' => ['login']]);
//        $this->middleware('refreshtk', ['except' => ['login']]);
        // 另外关于上面的中间件，官方文档写的是『auth:api』
        // 但是我推荐用 『jwt.auth』，效果是一样的，但是有更加丰富的报错信息返回


        //无需登录的接口
        $noLoginApi = [
            '\Admin\v1\TestController@ttt',
        ];

        $action = request()->route();
        $actionName = explode('Controllers',$action->action['controller'])[1];
        if (!in_array($actionName, $noLoginApi)){
            $this->middleware('refreshtk', ['except' => ['login','ttt']]);
        }

        $this->middleware('cors');
    }
}
