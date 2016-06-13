<h4 class="title">SALWA AKTUAL</h4>
@foreach ($artikel as $a)
<div class="row-post">
	<div class="media">
		<div class="media-left media-middle">
			<div class="thumbnail" style="height:60px;width:60px;">
				<img class="media-object cover" src="/{{ $a->img_artikel }}" alt="{{ $a->judul }}">
			</div>
		</div>
		<div class="media-body">
			<a href="/artikel/{{ $a->artikel_id }}-{{ $a->kd_judul }}" class="text-bold">{{ str_limit($a->judul,55) }}</a>
			<br>
			<small>{{ $a->user ? $a->user->name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>
@endforeach
