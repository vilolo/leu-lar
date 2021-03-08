<?php


namespace App\Tools;


use App\Exceptions\ApiException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as IValidator;

class Utils
{
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
