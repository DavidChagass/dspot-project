
<div>
    <!-- Todos os elementos HTML do componente devem estar dentro desse div -->
    <h1>Gerente Dashboard</h1>
    <ul>
        @foreach($estoques as $estoque)
            <li>
                {{ $estoque->nome }}
                <ul>
                    @foreach($estoque->produtos as $produto)
                        <li>produto: {{ $produto->produto }}</li>
                        <li>detalhes: {{$produto->detalhes}}</li>
                        <li>quantidade Atual: {{$produto->quantidadeAtual}}</li>
                        <li>quantidade Total: {{$produto->quantidadeTotal}}</li>
                        <li>perecivel: {{$produto->perecivel}}</li>
                        <li>data Validade: {{$produto->dataValidade}}</li>
                        <li>preco Compra: {{$produto->precoCompra}}</li>
                        <li>preco Venda: {{$produto->precoVenda}}</li>
                        <li>fornecedor: {{$produto->fornecedor}}</li>
                        @endforeach
                    </ul>
            </li>
        @endforeach
    </ul>
</div>
