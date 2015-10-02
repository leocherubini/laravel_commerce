<h1>Categories</h1>

<ul>
	@foreach($categories as $category)
	<li>{{ $category->name }}</li>
	<li>{{ $category->description }}</li>
	@endforeach
</ul>