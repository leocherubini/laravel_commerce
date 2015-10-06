@extends('app')

@section('content')
	<div class="container">
		<h1>Categories</h1>

		<br>
		<a href="{{ route('categories.create') }}" class="btn btn-default">New Category</a>

		<br>
		<br>

		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Action</th>
			</tr>

			@foreach($categories as $category)
			<tr>
				<th>{{ $category->id }}</th>
				<th>{{ $category->name }}</th>
				<th>{{ $category->description }}</th>
				<th>
					<a href="{{ route('categories.edit', ['id' => $category->id]) }}">Editar</a> |
					<a href="{{ route('categories.destroy', ['id' => $category->id]) }}">Remover</a>
				</th>
			</tr>
			@endforeach
		</table>
	</div>
@endsection