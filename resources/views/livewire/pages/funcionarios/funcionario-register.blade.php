<div class="form-wrapper-login">
    <form class="flex flex-col" wire:submit.prevent="register">
        @csrf

        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label class="block text-sm font-medium leading-6 text-gray-900" for="empresa_id">ID da Empresa</label>
            <div class="mt-2">
                <input type="text" id="empresa_id" wire:model="empresa_id" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
            </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="nome" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
            <div class="mt-2">
                <input type="text" id="nome" wire:model.defer="nome" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
            </div>
        </div>


        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
                <input type="email" id="email" wire:model="email" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
            </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
            <div class="mt-2">
                <input type="password" id="password" wire:model="password" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
            </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirme a Senha</label>
            <div class="mt-2">
                <input type="password" id="password_confirmation" wire:model="password_confirmation" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
            </div>
        </div>

        <button type="submit" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Registrar</button>

        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        @if (session()->has('error'))
        <div>{{ session('error') }}</div>
        @endif

        @if (session()->has('success'))
        <div>{{ session('success') }}</div>
        @endif
    </form>
</div>