<div>

    <form style="grid-template-columns:40% 60%;" wire:submit.prevent="login" class="grid grid-rows-4 grid-cols-2" >
        @csrf
        <!-- dominio -->

            <label for="dominio">Domínio</label>
            <input type="text" id="dominio" wire:model="dominio" required>


        <!-- email -->

            <label for="email">Email</label>
            <input type="email" id="email" wire:model="email" required>


        <!-- password -->

            <label for="password">Password</label>
            <input type="password" id="password" wire:model="password" required>


        <!-- botao -->
        <button class="col-start-1 col-span-2" type="submit" style="background: green">Login</button>

        <!-- erro ai pra ti -->
        @if (session()->has('error'))
            <div>{{ session('error') }}</div>
        @endif
    </form>


</div>
