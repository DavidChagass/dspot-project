
<div>

    <h1>Gerente Dashboard</h1>
    <h2><a href="{{route('funcionario-register')}}">inserir funcionario</a></h2>
    <ul>
        @foreach ($estoques as $estoque)
            <li>
                {{ $estoque->nome }}
                <ul>
                    @foreach($estoque->produtos as $produto)
                        <li>
                            {{ $produto->produto }}
                            {{ $produto->detalhes }}
                            {{ $produto->perecivel }}
                            <!-- ... -->
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

</div>
