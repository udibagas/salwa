<div class="row-post">
	<strong>{{ $a->nama_surat }}</strong>
	<br>
	<audio controls="controls" preload="none" style="width:100%;margin-top:5px;"><source src="/{{ $a->file_mp3 }}" type="application/ogg"></source></audio>
	<br>
	<a href="/murottal/{{ $a->murotal_id }}/download" class="btn btn-info"><span class="fa fa-download"></span> Download</a>
</div>
