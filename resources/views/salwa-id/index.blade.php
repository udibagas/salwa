@extends('layouts.salwa-id')

@section('title') Search : {{ request('q') }} @stop

@section('content')

<div class="text-center">
	<a href="/salwa.id">
		<img src="/images/salwa-id.png" alt="Salwa.id" class="img-responsive" style="width:200px;display:block;margin:0 auto 40px;" />
	</a>
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-1">

		<div class="" style="margin-bottom:20px;">
			@include('salwa-id._form')
		</div>

		@if (request('q'))

		<ul class="list-group">
			<li class="text-center list-group-item">
				<h4>{{ $posts->total() }} results for {{ request('q') }} in {{ $time }} ms</h4>
			</li>
			@each('salwa-id._item', $posts, 'p')
		</ul>

		@else

		<div class="row no-gutter">
			@include('salwa-id._video')
		</div>

		@endif

	</div>
	<div class="clearfix"></div>
</div>

@if (request('q'))
	<div class="text-center">
		{!! $posts->appends(['q' => request('q')])->links() !!}
	</div>
@endif

@stop

@push('script')

<script type="text/javascript">
	$('.list-group h4, .list-group p').each(function(index, element) {
		text = $(this).html().replace(RegExp(q, "gi"),'<b>'+q+'</b>');
		$(this).html(text);
	});
</script>

@endpush
