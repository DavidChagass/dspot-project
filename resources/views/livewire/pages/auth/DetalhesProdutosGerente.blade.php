<div>


<table>
    <thead>
        <th>Produto</th>
        <th>detalhes</th>
        <th>perecivel</th>
        <th>quant atual</th>
        <th>quant total</th>
        <th>preco compra</th>
        <th>preco venda</th>
        <th>data de validade</th>
        <th>fornecedor</th>
    </thead>
    <tbody>
       {{--  @foreach ($produtos as $prod) --}}
            <tr>
                <td>{{ $produto->produto }}</td>
                <td>{{ $produto->detalhes }}</td>
                <td>{{ $produto->perecivel }}</td>
                <td>{{ $produto->quantidadeAtual }}</td>
                <td>{{ $produto->quantidadeTotal }}</td>
                <td>{{ $produto->precoCompra }}</td>
                <td>{{ $produto->precoVenda }}</td>
                <td>{{ $produto->dataValidade }}</td>
                <td>{{ $produto->fornecedor }}</td>
            </tr>
{{--         @endforeach
 --}}    </tbody>
</table>

<a href=" {{route('produtos.edit', $produto->id)}}">editar o produto</a>




</div>
