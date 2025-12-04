<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Importa a classe Request
use App\Models\Item; // Importa o modelo Item 

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //listar todos os itens <----------
    {
        $items = Item::all(); // Pega todos os itens do banco de dados
        return view('index', compact('items')); // Retorna a view 'index' com os itens
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // formulario de criação de item <----------
    {
        return view('create');// Retorna a view 'create' para criar um novo item 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // salvar novo item que foi criado com "Create" <----------
    { // Valida os dados recebidos do formulário
        $request->validate([
            'nome' => 'required',
            'quantidade' => 'required|integer|min:1',
        ]);

        Item::create($request->all()); // Cria um novo item no banco de dados 
        return redirect()->route('items.index') ->with('success', 'Item created successfully.'); // Redireciona para a lista de itens com uma mensagem de sucesso
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) // listar um item específico por id <----------
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item) // formulario de edição de item <----------
    {
        return view('edit', compact('item')); // Retorna a view 'edit' com o item específico
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)  // salvar as alterações feitas no item com "Edit" <----------
    { // Valida os dados recebidos do formulário
        $request->validate([
            'name' => 'required',
            'description' => 'required|integer|min:1',
        ]);

        $item->update($request->all()); // Atualiza o item no banco de dados
        return redirect()->route('items.index') ->with('success', 'Item updated successfully.'); // Redireciona para a lista de itens com uma mensagem de sucesso
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item) // deletar um item específico por id <----------
    {
        $item->delete(); // Deleta o item do banco de dados
        return redirect()->route('items.index') ->with('success', 'Item deleted successfully.'); // Redireciona para a lista de itens com uma mensagem de sucesso
    }
}
