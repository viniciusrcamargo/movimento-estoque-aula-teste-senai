<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $itens = Item::query()->orderBy('nome')->get();
        //@dd($itens);
        return view('item.index', compact('itens'));
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request){  
        //@dd($request->all());
        try {  
            $validaDados = $request->validate([  
                'nome' => 'required|string|max:255',
                'ativo' => 'required|string|max:255',
                'quantidade' => 'required|numeric|min:1',
            ],[
                'nome.required' => 'O campo nome é obrigatório.',
                'ativo.required' => 'O campo ativo é obrigatório.',
                'quantidade.required' => 'O campo quantidade é obrigatório.',
                'quantidade.numeric' => 'O campo quantidade deve ser numérico.',
                'quantidade.min' => 'O campo quantidade deve ser no mínimo 1.',
            ]);  

            $item = Item::create($validaDados);  
            return redirect()->route('item.index')->with('success', 'Item criado com sucesso'); 
        }catch (ValidationException $e) { // Erros de validação do Laravel  
            return redirect()->back()->withErrors($e->getMessage()); // Retorna 422 para erros de validação  
        } catch (\Exception $e) { // Outros erros, incluindo a exceção do banco de dados  
            return redirect()->back()->withErrors($e->getMessage());  
        }  
    }  

    public function edit(Request $request, $id)
    {
        $item = Item::find($id);
        return view('item.edit', compact('item'));
    }

    public function update(Request $request, $id){
    try {
        // Encontra o item ou lança uma exceção se não for encontrado
        $item = Item::findOrFail($id);

        // Valida os dados do request
        $validaDados = $request->validate([
            'nome' => 'required|string|max:255',
            'ativo' => 'required|string|max:255',
            'quantidade' => 'required|numeric|min:1',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'ativo.required' => 'O campo ativo é obrigatório.',
            'quantidade.required' => 'O campo quantidade é obrigatório.',
            'quantidade.numeric' => 'O campo quantidade deve ser numérico.',
            'quantidade.min' => 'O campo quantidade deve ser no mínimo 1.',
        ]);

        // Atualiza o item com os dados validados
        $item->update([
            'nome' => $request->nome,
            'ativo' => $request->ativo ?? 'Sim',
            'quantidade' => $request->quantidade,
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('item.index')->with('success', 'Item atualizado com sucesso!');
    } catch (ValidationException $e) {
        // Retorna com erros de validação
        return redirect()->back()->withErrors($e->validator->errors());
    } catch (\Exception $e) {
        // Retorna com outros erros
        return redirect()->back()->withErrors($e->getMessage());
    }
}

    public function destroy($id){
      $item = Item::find($id);
      $item->delete();

      return redirect()->route('item.index');
    }
}
