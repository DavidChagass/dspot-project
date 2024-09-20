@if ($funcionario)
    <h1>Bem-vindo, {{ $funcionario->nome }}</h1>
@else
    <p>Funcionário não encontrado.</p>
@endif
