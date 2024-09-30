<div>

    <form class="md:container" wire:submit.prevent="login">
        @csrf

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-lg">Login</h2>

            <div class="grid grid-rows-3 grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Domínio</label>
                    <div class="mt-2">
                        <input type="text" wire:model="dominio" id="domínio" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="email" wire:model="email" id="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="senha" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
                    <div class="mt-2">
                        <input id="password" type="password" wire:model="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            <div class="w-max flex justify-center">
                <button class="rounded w-20" type="submit" style="background: green">Login</button>
            </div>
            <!-- erro ai pra ti -->
            @if (session()->has('error'))
            <div>{{ session('error') }}</div>
            @endif
    </form>


</div>