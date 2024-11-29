<div>
    <div>
        <ul>
            <li>Nome: {{ $funcionario->name }}</li>
            <li>Email: {{ $funcionario->email }}</li>
        </ul>
    </div>

    <form action="{{ route('gerente.funcionario.destroy', $funcionario->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Deletar</button>
    </form>
</div>
