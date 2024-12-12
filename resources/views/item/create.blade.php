<x-cabecalhoro titulo='Cadastro de Itens' tituloBody='Cadastro de Itens'>
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
    <form method="POST" action="{{route('item.store')}}">
        @csrf
        <div class="container">
            <div class="mb-3 row">
                <div class="col-8">
                    <label for="nome" class="form-label">Nome do Item</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                
                <div class="col-4">
                    <label for="ativo" class="form-label">Ativo</label>
                    <select class="form-select" aria-label="Large select example" name="ativo" id="ativo">
                        <option selected disabled>Selecione o status</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="descricao" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success btn-lg">Salvar</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</x-cabecalhoro>