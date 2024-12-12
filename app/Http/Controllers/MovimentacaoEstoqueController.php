<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\MovimentacaoEstoque;
use Illuminate\Support\Facades\DB;

class MovimentacaoEstoqueController extends Controller
{
    public function index()
    {
        $movimentacoes = MovimentacaoEstoque::select(
            'movimentacoes_estoque.*',
            'item.nome as item_nome',
        )
        ->join('item', 'movimentacoes_estoque.id_item', '=', 'item.id')
        ->get();
    
        return view('movimentacoes.index', compact('movimentacoes'));
    }

    public function create()
    {
        $itens = Item::all();
        return view('movimentacoes.create', compact('itens'));
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'id_item' => 'required|exists:item,id', // Verifica se o item existe na tabela 'item' e usa a coluna 'id'
            'tipo' => 'required|in:entrada,saida', // Tipo deve ser 'entrada' ou 'saida'
            'quantidade' => 'required|integer|min:1', // Quantidade deve ser um número inteiro positivo
        ], [
            'id_item.exists' => 'O item selecionado não existe.',
            'tipo.in' => 'O tipo deve ser "entrada" ou "saida".',
            'quantidade.min' => 'A quantidade deve ser pelo menos 1.',
        ]);
    
        try {
            // Inicia uma transação para garantir consistência
            DB::transaction(function () use ($request) {
                // Cria a movimentação no banco de dados
                $movimentacao = new MovimentacaoEstoque();
                $movimentacao->id_item = $request->id_item;
                $movimentacao->tipo = $request->tipo;
                $movimentacao->quantidade = $request->quantidade;
                $movimentacao->save();
            });
    
            // Redireciona com mensagem de sucesso
            return redirect()->route('movimentacoes.create')->with('success', 'Movimentação registrada com sucesso.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Captura erros específicos do banco de dados
            $errorCode = $e->errorInfo[0]; // Código do erro
            $errorMessage = $e->errorInfo[2] ?? $e->getMessage(); // Mensagem do erro
    
            // Verifica se é um erro gerado pelo RAISE EXCEPTION do PostgreSQL
            if ($errorCode === 'P0001') { // Código genérico para RAISE EXCEPTION
                return redirect()->back()->withErrors(['error' => $errorMessage]);
            }
    
            // Para outros erros de banco de dados, retorna uma mensagem genérica
            return redirect()->back()->withErrors(['error' => 'Erro ao registrar a movimentação. Por favor, tente novamente.']);
        } catch (\Exception $e) {
            // Captura outros erros genéricos
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
