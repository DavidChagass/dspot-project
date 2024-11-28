<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

// Define a classe anônima que estende o componente Livewire
new class extends Component
{
    // Propriedades para armazenar as senhas do usuário
    public string $current_password = '';  // Senha atual do usuário
    public string $password = '';          // Nova senha
    public string $password_confirmation = ''; // Confirmação da nova senha

    /**
     * Atualiza a senha do usuário autenticado.
     *
     * @return void
     */
    public function updatePassword(): void
    {
        try {
            // Valida os dados da senha atual e a nova senha
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            // Se a validação falhar, limpa os campos de senha
            $this->reset('current_password', 'password', 'password_confirmation');

            // Lança a exceção de validação
            throw $e;
        }

        // Atualiza a senha do usuário autenticado
        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Limpa os campos após a atualização
        $this->reset('current_password', 'password', 'password_confirmation');

        // Dispara um evento indicando que a senha foi atualizada com sucesso
        $this->dispatch('password-updated');
    }
};
?>

<!-- Seção de atualização de senha -->
<section>
    <header>
        <!-- Título da seção -->
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <!-- Descrição sobre a atualização de senha -->
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <!-- Formulário para atualizar a senha -->
    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <!-- Campo de senha atual -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input wire:model="current_password" id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <!-- Campo de nova senha -->
        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input wire:model="password" id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Campo de confirmação da nova senha -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botões de ação -->
        <div class="flex items-center gap-4">
            <!-- Botão para salvar as alterações -->
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <!-- Mensagem de sucesso após a atualização da senha -->
            <x-action-message class="me-3" on="password-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
