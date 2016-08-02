<ul class="list-group affix" style="height:545px;overflow-x:hidden;overflow-y:auto;width:25%;border:2px solid #ddd;border-left:1px solid #ddd;">
	@foreach (\App\Surah::all() as $s)
	<li class="list-group-item @if (isset($surah->id) && $s->id == $surah->id) info  @endif">
		<div class="arab pull-right">{{ $s->arab }}</div>
		<a href="/quran/{{ $s->id }}">
			{{ $s->id }}. {{ strtoupper($s->nama) }} ({{ strtoupper($s->arti) }})
		</a>
		<br>
		<span class="label label-info">{{ $s->ayat }} ayat</span> <span class="label label-info">{{ $s->jenis }}</span>
		<br>
		<div class="btn-group" style="margin-top:10px;">
			<a href="#" class="btn btn-default btn-sm download-surah" data-id="{{ $s->id }}" data-toggle="tooltip" title="Download Audio"><i class="fa fa-download"></i></a>
			<a href="#" class="btn btn-default btn-sm pause-surah" data-toggle="tooltip" title="Pause Audio"><i class="fa fa-pause"></i></a>
			<a href="#" class="btn btn-default btn-sm play-surah" audiourl="/{{ str_pad($s->id, 3, '0', STR_PAD_LEFT) }}.mp3" data-toggle="tooltip" title="Play Audio"><i class="fa fa-play"></i></a>
		</div>
	</li>
	@endforeach
</ul>
