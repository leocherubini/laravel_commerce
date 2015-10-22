@extends('app')

@section('content')

	<!-- Container da pagina index -->
	<div class="container">
		<h1>Products</h1>

		<br>
		<a href="{{ route('products.create') }}" class="btn btn-default">New Products</a>

		<br>
		<br>

		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Category</th>
				<th>Action</th>
			</tr>

			@foreach($products as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->description }}</td>
				<td>{{ $product->price }}</td>
				<td>{{ $product->category->name }}</td>
				<th>
					<a href="{{ route('products.edit', ['id' => $product->id]) }}">Editar</a> | 
					<a href="{{ route('products.images', ['id' => $product->id]) }}">Images</a> | 
					<a href="{{ route('products.destroy', ['id' => $product->id]) }}">Remover</a>
				</th>
			</tr>
			@endforeach
		</table>

		{!! $products->render() !!}

	</div>
@endsection