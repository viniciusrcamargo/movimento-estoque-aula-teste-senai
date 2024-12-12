<x-cabecalhoro titulo='Cadastro de Itens' tituloBody='Cadastro de Movimentação'>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // const alertaErro = document.getElementById('alertaErro');
        // if(alertaErro){
        //     setTimeout(function() {
        //         alertaErro.style.display = 'none';
        //     }, 5000);
        // }
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
    <form method="POST" action="{{ route('movimentacoes.store') }}">
        @csrf
        <div class="container">
            <div class="mb-3 row">
                <div class="col-8">
                    <label for="categoria" class="form-label">Itens</label>
                    <select class="form-select" aria-label="Large select example" name="id_item" id="id_item">
                        <option selected disabled>Selecione o item</option>
                        @if(isset($itens))
                            @foreach($itens as $item)
                                <option value="{{$item->id}}" required>{{$item->nome}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3 col-4">
                    <label for="descricao" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                </div>
                
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <label for="tipo" class="form-label">Tipo de Movimentação</label>
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="" selected>Selecione o Tipo</option>
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success btn-lg">Salvar</button>
        </div>
    </form>
</div>

</x-cabecalhoro>