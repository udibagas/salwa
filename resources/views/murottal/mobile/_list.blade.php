<div class="row-post track" audiourl="/{{ $a->file_mp3 }}">
	<div class="pull-right">
		<a href="/murottal/{{ $a->murotal_id }}/download" class="btn btn-info btn-xs"><i class="fa fa-download"></i></a>
		@if (auth()->check() && auth()->user()->isAdmin())
		<a href="/murottal/{{ $a->murotal_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
		@endif
	</div>
	<strong>{{ $a->nama_surat }}</strong>
</div>
