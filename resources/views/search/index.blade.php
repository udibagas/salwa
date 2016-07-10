@extends('layouts.main')

@section('title') Search : {{ request('q') }} @stop

@section('content')
	<br>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<ul class="list-group">
				<li class="list-group-item info">
					{!! Form::open(['method' => 'GET', 'url' => '/search']) !!}
					{!! Form::text('q', request('q'), ['class' => 'form-control search-field', 'placeholder' => 'Search']) !!}
					{!! Form::close() !!}
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
		text = $(this).html().replace(RegExp(q, "gi"),'<b><i>'+q+'</i></b>');
		$(this).html(text);
	});
</script>

@endpush
