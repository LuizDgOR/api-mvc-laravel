<h1>listagem de produtos </h1>
<a href="{{ route('create.store.products')}}" >Criar Produto</a>

<table>
    <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
    </thead>
    <tbody>
        @foreach ($products as $product)
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
        </tr>
        @endforeach
    </tbody>
</table>
