<?php

namespace App\Exceptions;

use Artesaos\Defender\Exceptions\ForbiddenException;
use Exception;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Request;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Validation\ValidationException::class,
        ForbiddenException::class
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

        if ($exception instanceof ForbiddenException) {
            return response()->view('admin.errors.403', [], 403);
        }


        if ($this->isHttpException($exception)) {

            if (Request::segment(1) == 'admin') {
                switch ($exception->getStatusCode()) {
                    case '403':

                        return \Response::view('admin.errors.403', array(), 403);

                    // not found
                    case '404':
                        return \Response::view('admin.errors.404', array(), 404);
                        break;

                    // internal error
                    case '500':
                        return \Response::view('admin.errors.500', array(), 500);
                        break;

                    default:
                        return $this->renderHttpException($exception);
                        break;
                }
            }
        }else{
            return parent::render($request, $exception);
        }
    }
}
