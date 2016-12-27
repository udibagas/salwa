@extends('quran.main')

@section('title', 'Quran')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<br>
		@include('quran._search-form')
		<div id="post-list" style="margin-top:55px;">
			<img src="/quran_image/{{ sprintf("%03d", $page) }}.jpg" class="img-responsive" alt="" />
		</div>
	</div>
	<div class="clearfix"></div>
</div>

	<div class="text-center text-bold">
		<br /><img src="/images/loading.png" alt="" class="loading hidden" />
		<a href="{{ $nextPageUrl }}" class="next-page">LOAD MORE</a><br><br>
	</div>

@stop

@push('script')

<script type="text/javascript">
	var url = '{{ $nextPageUrl }}';
</script>

@endpush
