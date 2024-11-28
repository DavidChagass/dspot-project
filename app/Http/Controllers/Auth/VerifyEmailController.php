<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Marca o endereço de e-mail do usuário autenticado como verificado.
     *
     * @param EmailVerificationRequest $request
     * @return RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Verifica se o e-mail já foi verificado
        if ($request->user()->hasVerifiedEmail()) {
            // Redireciona para o dashboard com um parâmetro de sucesso na URL
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        // Marca o e-mail como verificado, caso ainda não tenha sido
        if ($request->user()->markEmailAsVerified()) {
            // Dispara o evento de e-mail verificado
            event(new Verified($request->user()));
        }

        // Redireciona para o dashboard com um parâmetro de sucesso na URL
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
