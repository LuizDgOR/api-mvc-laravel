<h1>Editar uma categoria</h1>
<form action="{{ route ('store.category.update', $category->id) }}" method="POST">
    @method('PUT')
    @csrf
    <input type="text" name="name" placeholder="Digite o nome da categoria" value="{{ $category->name }}">
    <textarea type="text" name="description" placeholder="Digite uma descrição">{{ $category->description }}</textarea>
    <button type="submit"> Editar </button>
</form>