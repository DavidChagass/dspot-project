<div class="form-wrapper">
    <form class="flex flex-col" wire:submit.prevent="login">
        @csrf

        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="dominio" class="block text-sm font-medium leading-6 text-gray-900">Domínio</label>
            <div class="mt-2">
                <input type="text" wire:model="dominio" id="dominio" name="dominio" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
                <input type="email" wire:model="email" id="email" name="email" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="senha" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
            <div class="mt-2">
                <input type="password" wire:model="password" id="senha" name="senha" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <button class="toggle-button">
                    <!-- O ícone será inserido aqui pelo JavaScript -->
                </button>
            </div>
        </div>
     {{--    <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <div class="mt-2">
                <select required wire:model.lazy="role" class="cursor-pointer p-2 bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="" selected data-default>Selecione seu cargo</option>
                    <option value="funcionario">Funcionário</option>
                    <option value="gerente">Gerente</option>
                    <option value="empresa">Empresa</option>
                </select>
            </div>
        </div> --}}
        <button class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" type="submit">Entrar</button>
        @if (session()->has('error'))
        <div class="error">{{ session('error') }}</div>
        @endif
    </form>
</div>
