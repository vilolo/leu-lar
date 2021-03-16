<?php

namespace App\Exceptions;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof ApiException){
            return response()->json(['message'=>$exception->getMessage(),'code'=>$exception->getCode()??433]);
        }

        if($exception instanceof FileNotFoundException){
            return response()->json(['message'=>'File Not Found'],404);
        }

        if(Request::expectsJson()){
            if($exception instanceof FileNotFoundException){
                return response()->json(['message'=>'File Not Found'],404);
            }
            if($exception instanceof ModelNotFoundException){
                return response()->json(['message'=>'Data Not Found'],404);
            }
            if($exception instanceof NotFoundHttpException){
                return response()->json(['message'=>'Page Not Found'],404);
            }
            if($exception instanceof PostTooLargeException){
                return response()->json(['message'=>'Post Too Large'],422);
            }
            if($exception instanceof ValidationException){
                return response()->json($exception->errors(),422);
            }
            return response()->json(['message'=>'error'],500);
        }

        return parent::render($request, $exception);
    }
}
