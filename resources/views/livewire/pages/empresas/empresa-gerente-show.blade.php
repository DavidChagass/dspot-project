<div>
    <div>
        <ul>
            <li>Nome: {{ $gerente->name }}</li>
            <li>Email: {{ $gerente->email }}</li>
        </ul>
    </div>

    <form action="{{route('empresa.gerente.destroy', $gerente->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Deletar</button>
    </form>
</div>
