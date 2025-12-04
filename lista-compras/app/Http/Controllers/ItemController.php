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
        return view('create');// 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // salvar novo item que foi criado com "Create" <----------
    {
        $request->validate([
            'nome' => 'required',
            'quantidade' => 'required|integer|min:1',
        ]);

        Item::create($request->all());
        return redirect()->route('items.index') ->with('success', 'Item created successfully.');
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
        return view('edit', compact('item')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)  // salvar as alterações feitas no item com "Edit" <----------
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|integer|min:1',
        ]);

        $item->update($request->all());
        return redirect()->route('items.index') ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item) // deletar um item específico por id <----------
    {
        $item->delete();
        return redirect()->route('items.index') ->with('success', 'Item deleted successfully.');
    }
}
