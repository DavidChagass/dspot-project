<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

// Define a classe anônima que estende o componente Livewire
new class extends Component
{
    // Propriedades para armazenar o nome e o e-mail do usuário
    public string $name = '';
    public string $email = '';

    /**
     * Método que é executado ao montar o componente.
     *
     * Inicializa as propriedades com as informações do usuário autenticado.
     *
     * @return void
     */
    public function mount(): void
    {
        // Preenche os campos com as informações do usuário autenticado
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Atualiza as informações do perfil do usuário autenticado.
     *
     * @return void
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user(); // Obtém o usuário autenticado

        // Valida os campos de nome e e-mail
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        // Preenche os dados do usuário com as informações validadas
        $user->fill($validated);

        // Se o e-mail foi alterado, marca como não verificado
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Salva as alterações no banco de dados
        $user->save();

        // Dispara o evento de atualização do perfil
        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Envia uma notificação de verificação de e-mail para o usuário atual.
     *
     * @return void
     */
    public function sendVerification(): void
    {
        $user = Auth::user(); // Obtém o usuário autenticado

        // Se o e-mail já foi verificado, redireciona para o painel
        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));
            return;
        }

        // Envia o link de verificação por e-mail
        $user->sendEmailVerificationNotification();

        // Exibe uma mensagem de status informando que o link de verificação foi enviado
        Session::flash('status', 'verification-link-sent');
    }
};
?>

<!-- Seção de edição do perfil do usuário -->
<section>
    <header>
        <!-- Título da seção -->
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <!-- Descrição da seção -->
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Formulário para atualizar o perfil -->
    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <!-- Campo de nome do usuário -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Campo de e-mail do usuário -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            <!-- Exibe a opção de reenviar o link de verificação de e-mail se necessário -->
            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    <!-- Exibe mensagem de sucesso ao enviar o link de verificação -->
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Botões de ação -->
        <div class="flex items-center gap-4">
            <!-- Botão para salvar as alterações -->
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <!-- Mensagem de sucesso após a atualização do perfil -->
            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
