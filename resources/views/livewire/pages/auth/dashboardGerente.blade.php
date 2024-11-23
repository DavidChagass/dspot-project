
<div>

    <h1>Gerente Dashboard</h1>
    <h2><a href="{{route('funcionario-register')}}">inserir funcionario</a></h2>
    <ul>
        @foreach ($estoques as $estoque)
            <li>
                {{ $estoque->nome }}
                <ul>
                    @foreach($estoque->produtos as $produto)
                    <li></li>
                   <ul>produto: {{ $produto->produto }}
                    <li>detalhes: {{$produto->detalhes}}</li>
                    <li>quantidade Atual: {{$produto->quantidadeAtual}}</li>
                    <li>quantidade Total: {{$produto->quantidadeTotal}}</li>
                    <li>perecivel: {{$produto->perecivel}}</li>
                    <li>data Validade: {{$produto->dataValidade}}</li>
                    <li>preco Compra: {{$produto->precoCompra}}</li>
                    <li>preco Venda: {{$produto->precoVenda}}</li>
                    <li>fornecedor: {{$produto->fornecedor}}</li>
                   </ul>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

</div>
