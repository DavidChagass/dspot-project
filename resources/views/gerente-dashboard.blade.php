{{-- <!DOCTYPE html>
<html>
<head>
    <title>Gerente Dashboard</title>
</head>
<body>
    <header>
        <!-- Seu cabeçalho aqui -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Seu rodapé aqui -->
    </footer>
</body>
</html>
 --}}



<div>

    <h1>Gerente Dashboard</h1>
    <h2><a href="{{route('funcionario-register')}}">inserir funcionario</a></h2>
    <ul>
        @foreach ($estoques as $estoque)
            <li>
                {{ $estoque->nome }}
                <ul>
                    @foreach ($estoque->produtos as $produto)
                        <li>
                            {{ $produto->produto }}
                        </li>
                        <li>
                            {{ $produto->detalhes }}
                        </li>
                        <li>
                            {{ $produto->perecivel }}
                        </li>
                        <li>
                            {{ $produto->quantidadeAtual }}
                        </li>
                        <li>
                            {{ $produto->quantidadeTotal }}
                        </li>
                        <li>
                            {{ $produto->precoCompra }}
                        </li>
                        <li>
                            {{ $produto->precoVenda }}
                        </li>
                        <li>
                            {{ $produto->dataValidade }}
                        </li>
                        <li>
                            {{ $produto->fornecedor }}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

</div>
