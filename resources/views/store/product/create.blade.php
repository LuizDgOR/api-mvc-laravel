<h1>Cria um produto</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
{{-- Action: quando submeter mandar para a rota store.store.products  --}}
<form action="{{ route('store.products.store')}}" method="POST">
    @csrf
    {{-- o old server para persistir o valor que estava no campo --}}
    <input type="text" name="name" placeholder="Nome do produto" value="{{ old('name') }}">
    <textarea type="text" name="description" cols="30" rows="5" placeholder="Descrição do produto">{{ old('description')}}</textarea>
    <input type="text" name="price" placeholder="Preço do produto" value="{{ old('price') }}">
    <label for="category_id">Escolha a categoria do produto</label>
    <select name="category_id" id="category_id">
        <option value="">Escolha uma categoria</option>
        @foreach ($categories as $category)
            <option value="{{ $category['id'] }}">
                {{ $category['name'] }}
            </option>
        @endforeach
    </select>
    <button type="submit">Criar</button>
</form>
