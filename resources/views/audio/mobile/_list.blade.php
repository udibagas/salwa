<div class="row-post">
	<strong><a href="/audio/{{ $a->mp3_download_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></strong>
	<br>
	<small>{{ $a->updated->diffForHumans() }}</small>
	<br />
	<audio controls="controls" preload="none" style="width:100%;margin-top:5px;"><source src="/{{ $a->file_mp3 }}" type="application/ogg"></source></audio>
	<!-- <br> -->
	<!-- <a href="/audio/{{ $a->mp3_download_id }}/download" class="btn btn-info"><span class="fa fa-download"></span> Download</a> -->
</div>
