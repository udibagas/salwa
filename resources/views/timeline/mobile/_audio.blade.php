@if ($p->file)
	<br>
	<audio controls="controls" preload="none" style="width:100%"><source src="/{{ $p->file }}" type="application/ogg"></source></audio>
	<br>
@endif
