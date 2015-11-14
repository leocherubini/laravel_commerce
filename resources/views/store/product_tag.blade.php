@extends('store.store')

@section('categories')
    @include('store.partial.tags', ['tags'=>$tags])
@stop

@section('content')
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->

        <h2 class="title text-center">{{ $tag->name }}</h2>

        @include('store.partial.product', ['products' => $tag->products])

    </div><!--features_items-->

</div>
@stop