<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Validator;

class NewsletterSubscriberController extends Controller
{

    use ApiResponse;

   /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        // Verificar se a validação falhou
        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        try {
            NewsletterSubscriber::create(['email' => $request->email]);
            return $this->successResponse(null, 'Email salvo com sucesso!', 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Erro ao salvar o email.', 500);
        }
    }
}
