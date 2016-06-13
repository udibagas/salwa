<h4 class="title">SALWA VIDEO</h4>
@foreach ($videos as $a)
<div class="row-post">
	<div class="media">
		<div class="media-left media-middle">
			<div class="thumbnail" style="height:60px;width:60px;">
				<img class="media-object cover" src="/{{ $a->img_video }}" alt="{{ $a->title }}">
			</div>
		</div>
		<div class="media-body">
			<a href="/video/{{ $a->video_id }}-{{ $a->title_code }}" class="text-bold">{{ str_limit($a->title, 55) }}</a>
			<br>
			<small>{{ $a->user ? $a->user->name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>
@endforeach
