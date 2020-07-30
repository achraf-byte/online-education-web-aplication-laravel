<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('teacher') || $request->is('teacher/*')) {
            return redirect()->guest('/login/teacher');
        }

        if ($request->is('student') || $request->is('student/*')) {
            return redirect()->guest('/login/student');
        }


        return redirect()->guest(route('login'));
    }
}