@extends('app')

@section('content')

	<!-- Container da pagina index -->
	<div class="container">
		<h1>Images of {{ $product->name }}</h1>

		<br>
		<a href="{{ route('products.images.create', ['id'=>$product->id]) }}" class="btn btn-default">New Image</a>

		<br>
		<br>

		<table class="table">
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Extension</th>
				<th>Action</th>
			</tr>

			@foreach($product->images as $image)
			<tr>
				<td>{{ $image->id }}</td>
				<td>
					<img src="{{ 'https://s3-sa-east-1.amazonaws.com/mycommercefiles/'.$image->id.'.'.$image->extension }}" width="80">
				</td>
				<td>{{ $image->extension }}</td>
				<th>
					<a href="{{ route('products.images.destroy', ['id'=>$image->id]) }}">
						Delete
					</a>
				</th>
			</tr>
			@endforeach
		</table>

		<a href="{{ route('products') }}" class="btn btn-default">Voltar</a>

	</div>
@endsection