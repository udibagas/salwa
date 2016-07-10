<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">TAFSIR</a></li>
	<li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">TAJWID</a></li>
	<li role="presentation"><a href="#3" aria-controls="3" role="tab" data-toggle="tab">MUFRODAT</a></li>
</ul>

<br />
<!-- <audio controls="controls" preload="none" style="width:100%"><source src="" type="application/ogg"></source></audio>
<br />
<br /> -->

<!-- Tab panes -->
<div class="tab-content">

	<div role="tabpanel" class="tab-pane active" id="1">
		@foreach ($ayats as $a)
			<b>[{{ $a->surat_id }}:{{ $a->ayat_id }}]</b> {{ $a->tafsir }}
			<hr>
		@endforeach
	</div>

	<div role="tabpanel" class="tab-pane" id="2">
		@foreach ($ayats as $a)
			<b>[{{ $a->surat_id }}:{{ $a->ayat_id }}]</b> {{ $a->tajwid }}
			<hr>
		@endforeach
	</div>

	<div role="tabpanel" class="tab-pane" id="3">
		@foreach ($ayats as $a)
			<b>[{{ $a->surat_id }}:{{ $a->ayat_id }}]</b> {{ $a->mufrodat }}
			<hr>
		@endforeach
	</div>

</div>
