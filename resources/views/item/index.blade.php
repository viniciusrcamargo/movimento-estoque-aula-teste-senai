<x-cabecalhoro titulo='Movimento de Estoque - Senai' tituloBody='Itens de Estoque'>

<div class="container mt-4">
<a href="{{ route('item.create') }}" class="btn btn-outline-success">Adicionar Itens</a>
<table class="table mt-3">
        <thead>
        <tr class="table-warning">
            <th scope="col">Nome</th>
            <th scope="col">Quantidade Estoque</th>
            <th scope="col">Ativo</th>
            <th scope="col">Data Cadastro</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($itens as $item)
                <tr>
                    <th>{{ $item->nome }}</th>
                    <th>{{ $item->quantidade }}</th>
                    <th>{{ $item->ativo }}</th>
                    <th>{{ $item->created_at->format('d/m/Y')}}</th>
                    <th>
                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary btn-sm d-inline-flex align-items-center">
                        <i class="bi bi-pencil"></i></a>

                        <form action="{{ route('item.destroy', $item->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                </tr>
              @endforeach
        </tbody>
    </table>
</div>
</div>
</x-cabecalhoro>