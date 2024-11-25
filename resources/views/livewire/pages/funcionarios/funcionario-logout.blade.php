<form action="{{ route('logout.funcionario') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit">Logout</button>
</form>
