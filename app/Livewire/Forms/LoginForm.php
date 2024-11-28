<?php

namespace App\Livewire\Forms;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    // Definindo a propriedade para o email com validação
    #[Validate('required|string|email')]
    public string $email = '';

    // Definindo a propriedade para a senha com validação
    #[Validate('required|string')]
    public string $password = '';

    // Definindo a propriedade para o "lembrar-me" com validação
    #[Validate('boolean')]
    public bool $remember = false;

    /**
     * Tenta autenticar o usuário com as credenciais fornecidas.
     *
     * @throws \Illuminate\Validation\ValidationException Se as credenciais estiverem erradas ou o login for bloqueado.
     */
    public function authenticate(): void
    {
        // Verifica se o login está sendo feito muito rapidamente, respeitando o limite de tentativas
        $this->ensureIsNotRateLimited();

        // Tenta autenticar o usuário com as credenciais de email e senha
        if (! Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            // Se falhar, incrementa o contador de tentativas e lança uma exceção de validação
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'form.email' => trans('auth.failed'), // Mensagem de erro se falhar na autenticação
            ]);
        }

        // Se o login for bem-sucedido, limpa as tentativas de login anteriores
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Verifica se o número de tentativas de autenticação não ultrapassou o limite.
     *
     * Caso o limite de tentativas seja excedido, bloqueia a autenticação por um período.
     */
    protected function ensureIsNotRateLimited(): void
    {
        // Verifica se o número de tentativas já ultrapassou o limite (9 tentativas)
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 9)) {
            return; // Se não, permite que o processo continue
        }

        // Caso o limite tenha sido atingido, dispara o evento de "lockout" para notificar o bloqueio
        event(new Lockout(request()));

        // Calcula o tempo restante para desbloqueio
        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Lança uma exceção de validação informando o tempo restante para a próxima tentativa
        throw ValidationException::withMessages([
            'form.email' => trans('auth.throttle', [
                'seconds' => $seconds, // Tempo restante em segundos
                'minutes' => ceil($seconds / 60), // Tempo restante em minutos
            ]),
        ]);
    }

    /**
     * Obtém a chave de limitação de taxa de autenticação.
     *
     * A chave é baseada no email do usuário e no IP da requisição para garantir que o rate limiter seja único por usuário/IP.
     */
    protected function throttleKey(): string
    {
        // Cria uma chave única para cada email e IP, usando o email em minúsculo e sem acentuação
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}
