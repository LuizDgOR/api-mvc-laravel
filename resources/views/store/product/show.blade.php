<h1>Detalhes do produto {{ $product->id }}</h1>

<ul>
    <li>Nome:{{ $product->name }}</li>
    <li>Descrição:{{ $product->description}}</li>
    <li>Preço: {{ $product->price }}</li>
</ul>

<form action="{{ route ('store.products.destroy', $product->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"> Deletar </button>
</form>
