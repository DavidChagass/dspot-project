<div>
    <form action="{{ url('/empresa/estoque/'.$estoque->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nome">nome do estoque</label>
            <input type="text" name="nome" required id="nome" wire:model="nome" value="{{ $estoque->nome }}">
            @error('nome')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">salvar</button>
    </form>
    <h1>deletar o produto</h1>

    <form action=" {{ route('empresa.estoque.destroy', $estoque->id) }} " method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">deletar o produto</button>
    </form>

</div>
