<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
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
    public function render($request, Exception $e)
    {
        if ($e instanceof AuthenticationException) {
            return response('You do not have valid credentials', 401);
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return response('Method Not Allowed', 405);
        }

        if ($e instanceof ValidationException) {
            $validationErrors = $e->validator->errors();
            return response($validationErrors, 400);
        }

        if ($e instanceof \PDOException) {
            if (strtolower(env('APP_ENV')) == 'local') {
                return response($e->getMessage(), 500);
            } else {
                return response('Internal Server Error', 500);
            }
        }

        if ($e instanceof ModelNotFoundException) {
            $modelPathAsArray = explode('\\', $e->getModel());
            $model = $modelPathAsArray[count($modelPathAsArray) - 1];
            return response($model . ' not found', 404);
        }

        if ($e instanceof NotFoundHttpException){
            return response('Resource not found', 404);
        }

        if ($e instanceof AuthorizationException) {
            return response($e->getMessage(), 403);
        }

        if ($e instanceof ServiceUnavailableHttpException){
            return response('Authentication Service is not available. Try later.', 503);
        }

        return parent::render($request, $e);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest('login');
    }
}
