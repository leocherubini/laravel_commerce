<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Tags</h2>
        <div class="panel-group category-products" id="accordian"><!--tags-->

            @foreach($tags as $tag)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{ route('tag', ['id'=>$tag->id]) }}">{{ $tag->name }}</a>
                        </h4>
                    </div>
                </div>
            @endforeach
            
        </div><!--/tags-->
    </div>
</div>