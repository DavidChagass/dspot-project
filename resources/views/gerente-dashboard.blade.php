<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <H1>Seus Produtos</H1>
    <form action="{{ route('gerente.inserir-estoque') }}">
        @csrf

        <label for="produto">Produto:</label>
        <input type="text" id="produto" name="produto"><br><br>

        <label for="detalhes">Detalhes:</label>
        <input type="text" id="detalhes" name="detalhes"><br><br>

        <label for="perecivel">Perecível:</label>
        <input type="text" id="perecivel" name="perecivel"><br><br>

        <label for="quantidadeAtual">Quantidade Atual:</label>
        <input type="number" id="quantidadeAtual" name="quantidadeAtual"><br><br>

        <label for="quantidadeTotal">Quantidade Total:</label>
        <input type="number" id="quantidadeTotal" name="quantidadeTotal"><br><br>

        <label for="precoCompra">preco Compra:</label>
        <input type="text" id="precoCompra" name="precoCompra"><br><br>

        <label for="precoVenda">preco Venda:</label>
        <input type="text" id="precoVenda" name="precoVenda"><br><br>

        <input type="hidden" id="dataUltimaModificacao" name="dataUltimaModificacao" value="{{ now() }}">        <label for="dataValidade">data Validade:</label>

        <input type="date" id="dataValidade" name="dataValidade"><br><br>

        <label for="fornecedor">fornecedor:</label>
        <input type="text" id="fornecedor" name="fornecedor"><br><br>






        <input type="submit" value="Inserir Estoque">
    </form>
</div>
