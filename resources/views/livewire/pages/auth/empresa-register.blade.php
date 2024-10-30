<div class="form-wrapper">
    <form class="flex flex-col" wire:submit.prevent="register">
        @csrf


        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="dominio" class="block text-sm font-medium leading-6 text-gray-900">Dominio</label>
            <div class="mt-2">
                <input type="text" id="dominio" wire:model.defer="dominio" required maxlength="10" name="dominio" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="nome" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
            <input type="text" id="nome" name="nome" wire:model.defer="nome" required class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <input type="email" id="email" name="email" wire:model="email" required class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="telefone" class="block text-sm font-medium leading-6 text-gray-900">Telefone</label>
            <input type="text" id="telefone" name="telefone" wire:model.defer="telefone" maxlength="15" required class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
            <input type="password" id="password" wire:model="password" required class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirme a Senha</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" required class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('password_confirmation')
            <span class="error">{{ $message }}</span>
            @enderror
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

