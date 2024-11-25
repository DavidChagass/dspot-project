<div>

    <h1>Gerente Dashboard</h1>
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
                            <td><a href="{{route('funcionario.produtos.show', $prod->id)}} ">mostrar mais detalhes</a></td>
                        </tr>
                    @endforeach
                </tbody>
            @endforeach


        </table>

</div>
