@extends('app')

@section('content')

<div class="container">
	<h1>Upload Image</h1>

	@if($errors->any())
	<ul class="alert">
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif
	
	{!! Form::open(['route'=>['products.images.store', $product->id], 'method'=>'post', 'enctype'=>"multipart/form-data"]) !!}

	<!-- Image Form Select -->

	<div class="form-group">
		{!! Form::label('image', 'Image:') !!}
		
		<!-- Imagem livro -->
		<div class="fileinput fileinput-new" data-provides="fileinput">
			<div class="fileinput fileinput-new" data-provides="fileinput">
				<div class="fileinput-new thumbnail">
					<img data-src="holder.js/150x200">
				</div>
				
				<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
				<div>
					<span class="btn btn-default btn-file">
						<span class="fileinput-new">Insert Image</span>
						<span class="fileinput-exists">Change</span>
						{!! Form::file('image') !!}
					</span>
					<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		
		{!! Form::submit('Upload Image', ['class'=>'btn btn-primary']) !!}

	</div>

	{!! Form::close() !!}

</div>

@endsection