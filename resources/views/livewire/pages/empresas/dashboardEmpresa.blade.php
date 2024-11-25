<div>
    <h2>Bem-vindo à Página Inicial</h2>
    <div>
        <a href="{{ route('gerente-register') }}">registrar gerente</a>
        <a href="{{ route('empresa.estoque.create') }}">criar novo estoque</a>
    </div>
    <p>Este é o conteúdo da home.</p>
    <ul>
        <table>
            @foreach ($estoques as $es)
                <ul>
                    <li>nome do estoque: {{ $es->nome }}</li>

                </ul>
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
            @endforeach


        </table>

</div>
