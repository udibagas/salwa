@extends('timeline.mobile.layout')

@section('content')

	<div id="post-list">
		@each('timeline.mobile._item', $posts, 'p')
	</div>

	@if ($posts->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $posts->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	<a href="#" class="back-to-top">
		<img class="profile img-circle" data-name="&uarr;" style="position:fixed;bottom:65px;right:20px;" data-font-size="17" />
	</a>

	<a href="/timeline/create">
		<img class="profile img-circle" data-name="+" style="position:fixed;bottom:20px;right:20px;" data-font-size="28" />
	</a>

@stop

@push('script')
<script type="text/javascript">
	var url 		= '{{ $posts->nextPageUrl() }}';
	var type 		= '{{ request("type") }}';
	var q 			= '{{ request("q") }}';
	var lastPage 	= false;
	var nextBtn 	= $('.next-page');

	nextBtn.on('click', function(e) { e.preventDefault(); loadMore(); });

	var loadMore = function() {
		$.ajax({
			url: url, data: {type: type, q: q}, dataType: 'json',
			beforeSend: function() { nextBtn.hide(); $('.loading').removeClass('hidden'); },
			success: function(json) {
				$('.loading').addClass('hidden');
				$('#post-list').append(json.html);

				if (json.currentPage < json.lastPage) { nextBtn.show(); } else { lastPage = true; nextBtn.parent().html('<br />END<br /><br />'); }

				$('.profile').initial({charCount:1, height:40, width:40,fontSize:17});
				if (q.length > 0) { $('#post-list h4, #post-list p, #post-list .terjemahan').each(function(index, element) { text = $(this).html().replace(RegExp(q, "gi"),'<b>'+q+'</b>'); $(this).html(text); }); }
				url = json.nextPageUrl;
			}
		});
	};

	$('.profile').initial({charCount:1, height:40, width:40,fontSize:17});

	$(window).scroll(function() { if($(window).scrollTop() + $(window).height() == $(document).height() && lastPage == false && url != '') { loadMore(); } });

	$('body').on("click", ".back-to-top", function(e) { e.preventDefault(); $("html, body").animate({scrollTop: 0}, 700); });

	$('#post-list h4, #post-list p').each(function(index, element) { text = $(this).html().replace(RegExp(q, "gi"),'<b>'+q+'</b>'); $(this).html(text); });
	
</script>
@endpush
