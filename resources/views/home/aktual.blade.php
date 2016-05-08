<h4 class="title">AKTUAL</h4>
<div class="row no-gutter">
	@foreach ($artikel as $a)
		@include('artikel._list', ['artikel' => $a])
	@endforeach
</div>
