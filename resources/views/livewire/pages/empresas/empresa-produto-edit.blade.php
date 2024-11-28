<div>

    <div>
        <form method="POST" action=" {{ url('/empresa/produtos/' . $produto->id) }} ">
            @csrf
            @method('PUT')
            <div>
                <label for="produto">Nome do Produto</label>
                <input type="text" name="produto" wire:model="produto" value="{{$produto->produto }}"
                    required>
                @error('produto')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="detalhes">Detalhes do Produto</label>
                <textarea name="detalhes" wire:model="detalhes" required>{{ $produto->detalhes }}</textarea>
                @error('detalhes')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="perecivel">Perecível</label>
                <select name="perecivel" wire:model="perecivel" required>
                    <option value="0" {{ $produto->perecivel == 0 ? 'selected' : '' }}>Não</option>
                    <option value="1" {{ $produto->perecivel == 1 ? 'selected' : '' }}>Sim</option>
                </select>
                @error('perecivel')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="quantidadeAtual">Quantidade Atual</label>
                <input type="number" name="quantidadeAtual" wire:model="quantidadeAtual"
                    value="{{ $produto->quantidadeAtual }}" required>
                @error('quantidadeAtual')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="quantidadeTotal">Quantidade Total</label>
                <input type="number" name="quantidadeTotal" wire:model="quantidadeTotal"
                    value="{{ $produto->quantidadeTotal }}" required>
                @error('quantidadeTotal')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="precoCompra">Preço de Compra</label>
                <input type="number" name="precoCompra" wire:model="precoCompra" value="{{ $produto->precoCompra }}"
                    required>
                @error('precoCompra')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="precoVenda">Preço de Venda</label>
                <input type="number" name="precoVenda" wire:model="precoVenda" value="{{ $produto->precoVenda }}"
                    required>
                @error('precoVenda')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="dataValidade">Data de Validade</label>
                <input type="date" name="dataValidade" wire:model="dataValidade"
                    value="{{ $produto->dataValidade }}">
                @error('dataValidade')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="fornecedor">Fornecedor</label>
                <input type="text" name="fornecedor" wire:model="fornecedor" value="{{ $produto->fornecedor }}"
                    required>
                @error('fornecedor')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit">Atualizar Produto</button>
        </form>
    </div>

</div>
