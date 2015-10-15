@extends('app')

@section('content')

<div class="container">
	<h1>Edit Product: {{ $product->name }}</h1>

	@if($errors->any())
	<ul class="alert">
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif
	
	{!! Form::open(['route'=>['products.update', $product->id], 'method'=>'put']) !!}

	<!-- Category Form Select -->

	<div class="form-group">
		{!! Form::label('category', 'Categories:') !!}
		{!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
	</div>

	<!-- Name Form Input -->

	<div class="form-group">
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
	</div>

	<!-- Description Form Input -->

	<div class="form-group">
		{!! Form::label('description', 'Description:') !!}
		{!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
	</div>

	<!-- Price From Input -->
	<div class="form-group">
		{!! Form::label('price', 'Price:') !!}
		{!! Form::input('number', 'price', $product->price, ['class'=>'form-control']) !!}
	</div>

	<!-- Featured From Input -->
	<div class="form-group">
		{!! Form::label('featured', 'Featured:') !!}<br>
		{!! Form::radio('featured', '1', $product->featured == 1) !!}
		{!! Form::label('featuredTrue', 'Yes') !!}
		{!! Form::radio('featured', '0', $product->featured == 0) !!}
		{!! Form::label('featuredFalse', 'No') !!}
	</div>

	<!-- Recommend From Input -->
	<div class="form-group">
		{!! Form::label('recommend', 'Recommend:') !!}<br>
		{!! Form::radio('recommend', '1', $product->recommend == 1)!!}
		{!! Form::label('recommendTrue', 'Yes') !!}
		{!! Form::radio('recommend', '0', $product->recommend == 0)!!}
		{!! Form::label('recommendFalse', 'No') !!}
	</div>

	<div class="form-group">
		
	{!! Form::submit('Edit Category', ['class'=>'btn btn-primary form-control']) !!}

	</div>

	{!! Form::close() !!}

</div>

@endsection