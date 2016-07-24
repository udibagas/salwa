<div class="btn-group">
	<!-- <span class="btn btn-warning"><i class="fa fa-share-alt"></i></span> -->
	<a href="https://www.facebook.com/sharer.php?u=http://www.salamdakwah.com/quran/{{ $ayah->surat_id }}:{{ $ayah->ayat_id }}" class="btn btn-default" target="_blank" data-toggle="tooltip" title="Share to Facebook"><i class="fa fa-facebook"></i></a>
	<a href="https://twitter.com/share?url=http://www.salamdakwah.com/quran/{{ $ayah->surat_id }}:{{ $ayah->ayat_id }}" class="btn btn-default" target="_blank" data-toggle="tooltip" title="Share to Twitter"><i class="fa fa-twitter"></i></a>
	<a href="https://plus.google.com/share?url=http://www.salamdakwah.com/quran/{{ $ayah->surat_id }}:{{ $ayah->ayat_id }}" class="btn btn-default" data-toggle="tooltip" title="Share to Google+" target="_blank"><i class="fa fa-google-plus"></i></a>
</div>

<div class="btn-group">
	<a href="#" data-copytarget="{{$copytarget}}" class="btn btn-default copy-ayat" data-toggle="tooltip" title="Copy Ayat & Translation"><i class="fa fa-clone"></i></a>
	<a href="#" class="btn btn-default download" data-id="{{ $ayah->id }}" data-toggle="tooltip" title="Download Audio"><i class="fa fa-download"></i></a>
	<a href="/quran/{{ $ayah->id }}/detail-ayah" class="btn btn-default detail-ayah-btn" data-toggle="tooltip" title="Detail Ayat"><i class="fa fa-list-alt"></i></a>
</div>

<a href="#" class="btn btn-default play-ayat" data-toggle="tooltip" title="Play Audio"><i class="fa fa-play"></i></a>
<a href="#" class="btn btn-default pause-ayat" data-toggle="tooltip" title="Pause Audio"><i class="fa fa-pause"></i></a>
