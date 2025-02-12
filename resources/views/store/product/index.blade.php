<h1>listagem de produtos </h1>
<a href="{{ route('store.products.create')}}" >Criar Produto</a>

<table>
    <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
    </thead>
    <tbody>
        @foreach ($products->items() as $product)
        <tr>
            <td>
                {{$product->name}}
            </td>
            <td>
                {{$product->description}}
            </td>
            <td>
                {{$product->price}}
            </td>
            <td> {{$product->category['name']}} </td>
            <td>
                <a href="{{ route('store.products.show', $product->id) }}">Detalhes</a>
            </td>
            <td>
                <a href="{{ route('store.products.edit', $product->id) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<x-pagination 
    :paginator="$products" 
    :appends="$filter"
/>