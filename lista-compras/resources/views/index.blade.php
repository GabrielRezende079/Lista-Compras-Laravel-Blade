<!DOCTYPE html>
<html>
<head>
    <title>Lista de Compras</title>
</head>
<body>

<h1>Lista de Compras</h1>

<a href="{{ route('items.create') }}">Adicionar Item</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Ações</th>
    </tr>

    @foreach($items as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->nome }}</td>
        <td>{{ $item->quantidade }}</td>
        <td>
            <a href="{{ route('items.edit', $item->id) }}">Editar</a>

            <form action="{{ route('items.destroy', $item->id) }}"
                  method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
