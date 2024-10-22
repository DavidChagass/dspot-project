<div>
    <form class="flex flex-col" wire:submit.prevent="login">
        @csrf

        <div class="sm:col-span-2 sm:col-start-1 pb-3">
            <label for="dominio" class="block text-sm font-medium leading-6 text-gray-900">Domínio</label>
            <div class="mt-2">
                <input type="text" wire:model="dominio" id="dominio" name="dominio" class="bg-blue-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('dominio')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <input type="email" wire:model="email" placeholder="Email">
        @error('email')
        <span class="error">{{ $message }}</span>
        @enderror

        <input type="password" wire:model="password" placeholder="Senha">
        @error('password')
        <span class="error">{{ $message }}</span>
        @enderror

        <select wire:model.lazy="role">
            <option selected value="funcionario">Funcionário</option>
            <option value="gerente">Gerente</option>
            <option value="empresa">Empresa</option>
        </select>
        @error('role')
        <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">Entrar</button>
        @if (session()->has('error'))
        <div class="error">{{ session('error') }}</div>
        @endif
    </form>
</div>