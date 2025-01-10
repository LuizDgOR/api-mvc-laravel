<h1>Cria um produto</h1>

{{-- Action: quando submeter mandar para a rota store.store.products  --}}
<form action="{{ route('store.store.products')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nome do produto" id="">
    <textarea type="text" name="description" cols="30" rows="5" placeholder="Descrição do produto"></textarea>
    <input type="number" name="price" placeholder="Preço do produto" id="">
    <button type="submit">Criar</button>
</form>
