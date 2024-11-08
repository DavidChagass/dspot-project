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
    <ul>
        @foreach($estoques as $estoque)
            <li>
                {{ $estoque->nome }}
                <ul>
                    @foreach($estoque->produtos as $produto)
                        <li>
                            {{ $produto->produto }}
                            {{ $produto->detalhes }}
                            {{ $produto->perecivel }}
                            {{ $produto->quantidadeAtual }}
                            {{ $produto->quantidadeTotal }}
                            {{ $produto->precoCompra }}
                            {{ $produto->precoVenda }}
                            {{ $produto->dataValidade }}
                            {{ $produto->fornecedor }}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
