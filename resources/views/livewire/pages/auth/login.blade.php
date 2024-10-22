<div>
    <form wire:submit.prevent="login">
        @csrf



        <input type="text" wire:model="dominio" placeholder="dominio">
        @error('dominio')
            <span class="error">{{ $message }}</span>
        @enderror
        
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
