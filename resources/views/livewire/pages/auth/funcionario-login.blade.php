<div style="margin-left:10em">

    <form wire:submit.prevent="login">
        @csrf
        <!-- dominio -->
        <div>
            <label for="dominio">Domínio</label>
            <input type="text" id="dominio" wire:model="dominio" required>
        </div>

        <!-- email -->
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" wire:model="email" required>
        </div>

        <!-- password -->
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" wire:model="password" required>
        </div>

        <!-- botao -->
        <button type="submit" style="background: green"">Login</button>

        <!-- erro ai pra ti -->
        @if (session()->has('error'))
            <div>{{ session('error') }}</div>
        @endif
    </form>


</div>
