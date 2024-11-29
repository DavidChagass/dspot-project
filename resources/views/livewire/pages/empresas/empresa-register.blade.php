<div class="form-wrapper-register">
    <form class="flex flex-col" wire:submit.prevent="register">
        @csrf


        <div class="grid grid-cols-2 grid-rows-1 gap-4 pb-3">
            <div>
                <label for="dominio" class="block pr-2 text-sm font-medium leading-6 text-gray-900">Dominio</label>
                <input type="text" id="dominio" wire:model.defer="dominio" placeholder="00000-0*00" required maxlength="10" name="dominio" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <div>
                <label for="nome" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                <input type="text" id="nome" name="nome" wire:model.defer="nome" required class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="grid grid-cols-2 grid-rows-1 gap-4 pb-3">
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <input type="email" id="email" name="email" wire:model="email" required class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <div>
                <label for="telefone" class="block text-sm font-medium leading-6 text-gray-900">Telefone</label>
                <input type="text" placeholder="(00) 00000-0000" id="telefone" name="telefone" wire:model.defer="telefone" maxlength="15" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
            <input type="password" id="password" wire:model="password" required class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirme a Senha</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" required class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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