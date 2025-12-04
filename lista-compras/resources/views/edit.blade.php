<h1>Editar Item</h1>

<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    Nome:<br>
    <input type="text" name="nome" value="{{ $item->nome }}"><br><br>

    Quantidade:<br>
    <input type="number" name="quantidade" value="{{ $item->quantidade }}"><br><br>

    <button type="submit">Atualizar</button>
</form>

<a href="{{ route('items.index') }}">Voltar</a>
