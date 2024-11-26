
<div>

    <h1>Gerente Dashboard</h1>
    <h2><a href="{{route('funcionario-register')}}">inserir funcionario</a></h2>
    <h2><a href="{{route('gerente.produtos.create')}}">criar novo produto</a></h2>

    @foreach ($estoques as $es)
    <h1>nome do estoque: {{ $es->nome }}</h1>

      <table>

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
                        <td><a href="{{route('gerente.produtos.show', $prod->id)}}">mostrar mais detalhes</a></td>
                    </tr>
                @endforeach
            </tbody>


        </table>
    @endforeach

</div>
