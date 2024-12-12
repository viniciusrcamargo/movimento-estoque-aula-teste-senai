<x-cabecalhoro titulo='Edição de Itens' tituloBody='Edição de Itens'>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertaErro = document.getElementById('alertaErro');
        if(alertaErro){
            setTimeout(function() {
                alertaErro.style.display = 'none';
            }, 5000);
        }
    });
</script>
@if($errors->any())
    <div class="alert alert-danger" id="alertaErro" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card-body mt-5">
    <form method="POST" action="{{route('item.update',$item->id)}}">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="mb-3 row">
                <div class="col-8">
                    <label for="nome" class="form-label">Nome do Item</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{$item->nome}}">
                </div>

                
                <div class="col-4">
                    <label for="ativo" class="form-label">Ativo</label>
                    <select class="form-select" aria-label="Large select example" name="ativo" id="ativo" required>
                    <option value="Sim" {{ $item->ativo === 'Sim' ? 'selected' : '' }}>Sim</option>
                    <option value="Não" {{ $item->ativo === 'Não' ? 'selected' : '' }}>Não</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="descricao" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{$item->quantidade}}">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success btn-lg">Editar</button>
        </div>
    </form>
</div>

</x-cabecalhoro>