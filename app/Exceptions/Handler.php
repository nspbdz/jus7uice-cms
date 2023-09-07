<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Http\Exception\HttpResponseException;

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
	
	
	public function render($request, Throwable $e)
    {
        // if ($request->is('api/*')) {
            // return response()->json([
                // 'message' => 'Record not found.'
            // ], 404);
        // }
		
		// debug($e->getMessage());

		if($e->getMessage()){
			$message = $e->getMessage();
		} else {
			$message = "Unknown Error";
		}
		
		
		
			// 404
			$this->renderable(function (NotFoundHttpException $e, $request) {
				# Jika ajax request
				if(Request()->header('content-type') == "application/json"){
					return response()->json([
						'error_code' => $e->getStatusCode(),
						'error_message' => 'Resource not found.'
					], 404);
				} else {
					return response(view('error.backend_404'));
				}
			});
			
			
		
		
		/* handling token Miss 419 */		
		if ($e instanceof \Illuminate\Session\TokenMismatchException)
        {
			return redirect()
			->back()
			->withInput($request->except('password'))
			->withErrors([
				'message' => 'Validation Token was expired. Please try again']);		
		}
		
		if(!env('APP_DEBUG') && strtoupper(env('APP_ENV'))=="PRODUCTION") {
			
			# Jika ajax request
			if($request->header('content-type') == "application/json"){
				return response()->json([
				  'status' => "999",
				  'error_message' => $message,
				], 200);
			}
		}
		
        return parent::render($request, $e);
    }
}
