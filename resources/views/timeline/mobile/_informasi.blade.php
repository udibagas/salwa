@if ($p->img)
	<br>
	<img src="/{{ $p->img }}" alt="" class="img-responsive" />
	<br>
@endif

{!! $p->content !!}
