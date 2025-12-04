<h1>Adicionar Item</h1>

<form action="{{ route('items.store') }}" method="POST">
    @csrf

    Nome:<br>
    <input type="text" name="nome"><br><br>

    Quantidade:<br>
    <input type="number" name="quantidade"><br><br>

    <button type="submit">Salvar</button>
</form>

<a href="{{ route('items.index') }}">Voltar</a>
