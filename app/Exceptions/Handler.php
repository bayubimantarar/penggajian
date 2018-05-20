<?php

namespace App\Exceptions;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $class = get_class($exception);

        switch($class){
            case 'Illuminate\Auth\AuthenticationException':
            $guard = array_get($exception->guards(), 0);

            switch ($guard) {
                case 'pengguna':
                    $login = 'login.form';
                    break;
                case 'karyawan':
                    $login = 'karyawan.login';
                    break;
                default:
                    $login = 'karyawan.login';
                    break;
            }

            return redirect()->route($login);
        }

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException) {
            return response()->json([
                'success' => 0,
                'message' => $exception->getMessage()
            ], $exception->getStatusCode());
        }

        switch (get_class($exception->getPrevious())) {
            case \Tymon\JWTAuth\Exceptions\TokenExpiredException::class:
                return response()->json([
                    'success' => 0,
                    'message' => 'Token has expired'
                ], $exception->getStatusCode());
            case \Tymon\JWTAuth\Exceptions\TokenInvalidException::class:
                return response()->json([
                    'success' => 0,
                    'message' => 'Token is invalid'
                ], $exception->getStatusCode());
            case \Tymon\JWTAuth\Exceptions\TokenBlacklistedException::class:
                return response()->json([
                    'success' => 0,
                    'message' => 'Token is black list'
                ], $exception->getStatusCode());
            default:
            break;
        }

        return parent::render($request, $exception);
    }
}
