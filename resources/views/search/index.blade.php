@extends('layouts.main')

@section('title') Search : {{ request('q') }} @stop

@section('content')
	<br>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<ul class="list-group">
				<li class="list-group-item info">
					@include('search._form')
				</li>
				<li class="list-group-item text-center">
					<h4>{{ $posts->total() }} results for {{ request('q') }} in {{ $time }} ms</h4>
				</li>
				@each('search._item', $posts, 'p')
			</ul>

			<div class="text-center">
				{!! $posts->appends(['q' => request('q')])->links() !!}
			</div>
		</div>
	</div>
@stop

@push('script')

<script type="text/javascript">
	$('.list-group h4, .list-group p').each(function(index, element) {
		text = $(this).html().replace(RegExp(q, "gi"),'<b>'+q+'</b>');
		$(this).html(text);
	});
</script>

@endpush
