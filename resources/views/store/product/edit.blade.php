<h1>Editar produto: {{ $product->id }}</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
{{-- Action: quando submeter mandar para a rota --}}
<form action="{{ route('store.products.update', $product->id)}}" method="POST">
    @csrf
    @method('PUT')
    {{-- <input type="text" value="PUT" name="_method"> --}}
    <input type="text" name="name" placeholder="Nome do produto" value="{{ $product->name }}">
    <textarea name="description" cols="30" rows="5" placeholder="Descrição do produto">{{ $product->description }}</textarea>
    <input type="number" name="price" placeholder="Preço do produto" value="{{ $product->price }}">
    <button type="submit">Criar</button>
</form>
