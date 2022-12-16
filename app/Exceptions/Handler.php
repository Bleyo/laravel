<?php

namespace App\Exceptions;

use UserException;
use Throwable;
use Psr\Log\LogLevel;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<Throwable>
     */
    protected $levels = [
        LogLevel::INFO,
        LogLevel::ALERT,
        LogLevel::ERROR,
        LogLevel::DEBUG,
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'token',
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
       /*
        *  $this->renderable(function (UserException $e, $request) {
            return response()->view('errors.invalid-order', [], 500);
        });
        */
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
