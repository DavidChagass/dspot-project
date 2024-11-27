<div>

    <div>
        <form method="POST" action="{{-- {{url('funcionario-produto-edit/'.$produto->id)}} --}}">
            @csrf
            @method('PUT')

            <label for="quantidadeAtual">Quantidade Atual</label>
            <input type="number" name="quantidadeAtual" wire:model="quantidadeAtual" value="{{ $produto->quantidadeAtual }}" required>
            @error('quantidadeAtual')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="quantidadeTotal">Quantidade Total</label>
            <input type="number" name="quantidadeTotal" wire:model="quantidadeTotal" value="{{ $produto->quantidadeTotal }}" required>
            @error('quantidadeTotal')
                <span class="error">{{ $message }}</span>
            @enderror


            <button type="submit">salvar alterações</button>
        </form>
    </div>


</div>
