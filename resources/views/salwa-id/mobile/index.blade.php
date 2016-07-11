@extends('layouts.salwa-id')

@section('title') Search : {{ request('q') }} @stop

@section('content')

	<div style="height:50px;position:fixed;top:0;left:0;right:0;background-color:#032876;z-index:998;">
		<a href="/salwa.id">
			<img src="/images/salwa-id.png" alt="Salwa.id" class="img-responsive" style="height:30px;display:block;margin:10px auto;" />
		</a>
	</div>

	<div class="row-post" style="height:55px;position:fixed;top:50px;left:10px;right:10px;background-color:#D9EDF7;z-index:998;">
		@include('salwa-id._form')
	</div>

	@if (request('q'))
		<div id="post-list" style="margin-top:55px;">
			<div class="row-post text-center">
				<h4>{{ $posts->total() }} results for {{ request('q') }}</h4>
			</div>
			@each('salwa-id.mobile._item', $posts, 'p')
		</div>

	@else

	<div class="row-post no-gutter" style="margin-top:65px;">
		@foreach($posts->take(4) as $p)
			<div class="col-xs-6">
				<div style="height:150px;">
					<img src="/{{ $p->img_video }}" alt="{{ $p->title }}" class="img-responsive cover" />
				</div>
			</div>
		@endforeach
		<div class="clearfix"></div>
	</div>

	@endif

	@if (request('q') && $posts->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $posts->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif
@stop

@push('script')

<script type="text/javascript">

	@if (request('q'))
	$('#post-list h4, #post-list p').each(function(index, element) {
		text = $(this).html().replace(RegExp(q, "gi"),'<b>'+q+'</b>');
		$(this).html(text);
	});

	var url = '{{ $posts->nextPageUrl() }}';
	@endif

</script>

@endpush
