<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;
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
     * @param Throwable $throwable
     * @return void
     * @throws Throwable
     */
    public function report(Throwable $throwable)
    {
        parent::report($throwable);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $throwable
     * @return Response
     * @throws Throwable
     */
    public function render($request, Throwable $throwable)
    {
        return parent::render($request, $throwable);
    }
}
