<?php

namespace App\Exceptions;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;


use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;



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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof UnauthorizedHttpException) {
            if($exception instanceof TokenBlacklistedException){
                return response(['error' => 'Token cant be used , Try new one!'] , 400);
            }
            elseif($exception instanceof TokenInvalidException){
                return response(['error' => 'Token is invalid'] , 500);
            }
            elseif($exception instanceof TokenExpiredException){
                return response(['error' => 'Token is Expired'] , 500);
            }
            elseif($exception instanceof JWTException){
                return response(['error' => 'Token is not provided'] , 400);
            }
            else {
            return response()->json(['error' => "UNAUTHORIZED_REQUEST"], 401);
            }
        }

        return parent::render($request, $exception);
    }
    // public function render($request, Exception $exception)
    // {
    //     // detect instance
    //     if ($exception instanceof UnauthorizedHttpException) {
    //         // detect previous instance
    //         if ($exception->getPrevious() instanceof TokenExpiredException) {
    //             return response()->json(['error' => 'TOKEN_EXPIRED'], $exception->getStatusCode());
    //         } else if ($exception->getPrevious() instanceof TokenInvalidException) {
    //             return response()->json(['error' => 'TOKEN_INVALID'], $exception->getStatusCode());
    //         } else if ($exception->getPrevious() instanceof TokenBlacklistedException) {
    //             return response()->json(['error' => 'TOKEN_BLACKLISTED'], $exception->getStatusCode());
    //         } else {
    //             return response()->json(['error' => "UNAUTHORIZED_REQUEST"], 401);
    //         }
    //     }
    //     return parent::render($request, $exception);
    // }
}
