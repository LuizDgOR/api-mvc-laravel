<h1>listagem das categorias </h1>

@foreach ($categories as $category)
<div style="outline: auto">
    <li>{{ $category['description'] }}</li>
    <li>{{ $category['name'] }}</li>
    <a href="{{ route ('store.category.edit', $category['id']) }}"> Editar </a>
    <a href="{{ route ('store.category.show', $category['id']) }}"> detalhes </a>
    <form action="{{ route ('store.category.delete', $category['id']) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit"> deletar</button>
    </form>
</div>
@endforeach