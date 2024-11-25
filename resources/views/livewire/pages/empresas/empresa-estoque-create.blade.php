<div>

    <form action="{{ route('empresa.estoque.store') }}" method="POST">
        @csrf
        <div>
            <label for="nome">nome do estoque</label>
            <input type="text" name="nome" required id="nome" wire:model="nome">
            @error('nome')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">salvar</button>
    </form>

</div>
