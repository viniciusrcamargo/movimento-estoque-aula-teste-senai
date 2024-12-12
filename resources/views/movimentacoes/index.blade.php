<x-cabecalhoro titulo='Movimento de Estoque - Senai' tituloBody='Itens de Estoque'>

<div class="container mt-4">
<a href="{{ route('movimentacoes.create') }}" class="btn btn-outline-success">Adicionar Movimentação</a>
<table class="table mt-3">
        <thead>
        <tr class="table-warning">
            <th scope="col">Nome</th>
            <th scope="col">Quantidade Movimento</th>
            <th scope="col">Tipo</th>
            <th scope="col">Dt. Movimento</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($movimentacoes) && count($movimentacoes) > 0)
            @foreach ($movimentacoes as $mov)
                <tr>
                    <th>{{ $mov->item_nome }}</th>
                    <th>{{ $mov->quantidade }}</th>
                    <th>{{ $mov->tipo }}</th>
                    <th>{{ $mov->created_at->format('d/m/Y')}}</th>
                    <th>
                        <a href="{{ route('movimentacoes.edit', $mov->id) }}" class="btn btn-primary btn-sm d-inline-flex align-items-center">
                        <i class="bi bi-pencil"></i></a>

                        <form action="{{ route('movimentacoes.destroy', $mov->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                </tr>
              @endforeach
              @else
              <tr>
                <td colspan="5">Nenhum item cadastrado</td>
              </tr>
              @endif
        </tbody>
    </table>
</div>
</div>
</x-cabecalhoro>