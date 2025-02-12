<h1>Criar uma categoria</h1>
<form action="{{ route ('store.category.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Digite o nome da categoria">
    <textarea type="text" name="description" placeholder="Digite uma descrição"></textarea>
    <button type="submit"> Criar </button>
</form>