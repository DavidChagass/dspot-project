<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

// Define a classe anônima que estende o componente Livewire
new class extends Component
{
    // A variável para armazenar a senha do usuário
    public string $password = '';

    /**
     * Método para deletar o usuário autenticado.
     *
     * @param Logout $logout A ação de logout do usuário.
     * @return void
     */
    public function deleteUser(Logout $logout): void
    {
        // Valida o campo de senha, garantindo que seja uma senha atual
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        // Realiza o logout do usuário e exclui a conta
        tap(Auth::user(), $logout(...))->delete();

        // Redireciona para a página inicial após a exclusão
        $this->redirect('/', navigate: true);
    }
};
?>

<!-- Seção de interface do usuário para exclusão de conta -->
<section class="space-y-6">
    <header>
        <!-- Título da seção -->
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <!-- Descrição da seção -->
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Botão para abrir o modal de confirmação de exclusão de conta -->
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <!-- Modal de confirmação para exclusão de conta -->
    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">

            <!-- Título do modal -->
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <!-- Descrição adicional sobre a exclusão -->
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <!-- Campo de senha para confirmação -->
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <!-- Campo de entrada para a senha -->
                <x-text-input
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <!-- Exibição de erros de validação para o campo de senha -->
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Botões de ação no modal -->
            <div class="mt-6 flex justify-end">
                <!-- Botão para cancelar a ação e fechar o modal -->
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <!-- Botão para confirmar a exclusão da conta -->
                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
