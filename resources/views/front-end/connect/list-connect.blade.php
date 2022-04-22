<ul class="buy-center-linked-list-columns">
	@foreach($threads as $thread)
	@include('front-end.connect.item',['thread'=>$thread])
	@endforeach
</ul><!-- Pagination -->
{{$threads->links()}}