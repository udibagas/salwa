<h4 class="title">SALWA PEDULI</h4>
@foreach ($peduli as $a)
<div class="row-post">
	<div class="media">
		<div class="media-left media-middle">
			<div class="thumbnail" style="height:60px;width:60px;">
				<img class="media-object cover" src="/{{ $a->img_artikel }}" alt="{{ $a->judul }}">
			</div>
		</div>
		<div class="media-body">
			<a href="/peduli/{{ $a->peduli_id }}-{{ $a->kd_judul }}" class="text-bold">{{ str_limit($a->judul,55) }}</a>
			<br>
			<small>{{ $a->group ? $a->group->group_name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>
@endforeach
