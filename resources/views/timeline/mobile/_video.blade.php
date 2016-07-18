@if ($p->file)
	<br>
	<iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $p->file }}" frameborder="0" allowfullscreen></iframe>
	<br>
@endif

{!! $p->content !!}
