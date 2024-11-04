<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Display a JSON message if the API user has not authenticated
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $is_api_request = $request->route()->getPrefix() == 'api';

        if ($is_api_request == false) {
            return response()->view('auth.login');
        }

        return response()->json(['error' => __('notifications.401_description')], 401);
    }
}
