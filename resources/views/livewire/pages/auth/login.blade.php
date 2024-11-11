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
            <div class="mt-2 relative">
                <input type="password" wire:model="password" id="password" name="senha" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <button class="toggle-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="eye-icon"><path d="M12 15a3 3 0 100-6 3 3 0 000 6z" /><path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" /></svg>
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
