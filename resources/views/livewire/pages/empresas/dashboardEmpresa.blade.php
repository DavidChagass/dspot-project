<div>
    <h2>Bem-vindo à Página Inicial</h2>
    <div>
        <a href="{{ route('gerente-register') }}">registrar gerente</a>
        <a href="{{route('empresa.produtos.create')}}">criar produto</a>
        <a href="{{ route('empresa.estoque.create') }}">criar novo estoque</a>
    </div>
    <p>Este é o conteúdo da home.</p>

    @foreach ($estoques as $es)
        <table>
            <h1>nome do estoque: {{ $es->nome }}</h1>
            <thead>
                <th>Produto</th>
                <th>quant atual</th>
                <th>quant total</th>

            </thead>
            <tbody>

                @foreach ($es->produtos as $prod)
                    <tr>
                        <td>{{ $prod->produto }}</td>
                        <td>{{ $prod->quantidadeAtual }}</td>
                        <td>{{ $prod->quantidadeTotal }}</td>
                        <td><a href="{{ route('empresa.produtos.show', $prod->id) }}">mostrar mais detalhes</a></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endforeach

</div>
