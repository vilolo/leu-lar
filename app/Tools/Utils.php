<?php


namespace App\Tools;


use App\Exceptions\ApiException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as IValidator;

class Utils
{
    const CODE_OK = 200;
    const CODE_ERROR = 433;

    public static function resOk($msg = '', $data = [])
    {
        return response()->json([
            'code' => self::CODE_OK,
            'msg' => $msg?:'Success',
            'data' => $data
        ]);
    }

    public static function resError($msg = '', $data = [], $code = '')
    {
        return response()->json([
            'code' => $code?$code:self::CODE_ERROR,
            'msg' => $msg?:'Failed',
            'data' => $data
        ]);
    }

    public static function validator(Request $request, array $rules, array $messages = []){
        $validator = IValidator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $messages = $validator->errors()->toArray();
            $msg = '';
            foreach ($messages as $key => $value) { $msg = $value[0]; break;}
            throw new ApiException($msg,422);
        }
    }
}
