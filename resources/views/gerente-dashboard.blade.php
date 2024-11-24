<div>

    <h1>Gerente Dashboard</h1>
    <h2><a href="{{ route('funcionario-register') }}">inserir funcionario</a></h2>
    {{--     <ul>
        @foreach ($estoques as $estoque)
            <li>
                {{ $estoque->nome }}
                <ul>
                    @foreach ($estoque->produtos as $produto)
                        <ul>
                            <h2>produto: {{ $produto->produto }}</h2>
                            <li>detalhes: {{ $produto->detalhes }}</li>
                            <li>quantidade Atual: {{ $produto->quantidadeAtual }}</li>
                            <li>quantidade Total: {{ $produto->quantidadeTotal }}</li>
                            <li>perecivel: {{ $produto->perecivel }}</li>
                            <li>data Validade: {{ $produto->dataValidade }}</li>
                            <li>preco Compra: {{ $produto->precoCompra }}</li>
                            <li>preco Venda: {{ $produto->precoVenda }}</li>
                            <li>fornecedor: {{ $produto->fornecedor }}</li>
                        </ul>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
 --}}

    <table>
        @foreach ($estoque as $es)
        <ul>
            <li>{{ $es->nome }}</li>

        </ul>
        <thead>
            <th>Produto</th>
            <th>Detalhes</th>
            <th>quant atual</th>
            <th>quant total</th>
            <th>perecivel</th>
            <th>data validade</th>
            <th>preco compra</th>
            <th>preco venda</th>
            <th>fornecedor</th>
        </thead>
        <tbody>

                @foreach ($es->produtos as $prod)
                    <tr>
                        <td>{{ $prod->produto }}</td>
                        <td>{{ $prod->detalhes }}</td>
                        <td>{{ $prod->quantidadeAtual }}</td>
                        <td>{{ $prod->quantidadeTotal }}</td>
                        <td>{{ $prod->perecivel }}</td>
                        <td>{{ $prod->dataValidade }}</td>
                        <td>{{ $prod->precoCompra }}</td>
                        <td>{{ $prod->precoVenda }}</td>
                        <td>{{ $prod->fornecedor }}</td>
                    </tr>
                @endforeach
            </tbody>
            @endforeach


    </table>
</div>
