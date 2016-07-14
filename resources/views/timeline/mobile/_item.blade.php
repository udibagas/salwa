<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="" style="width:40px;width;40px;">
				<img class="media-object img-circle cover profile" data-name="{{ $p->judul }}" />
			</div>
		</div>
		<div class="media-body">
			<strong>Ini Nama saya</strong><br>
			<small class="text-muted">
				{{ $p->tanggal->diffForHumans() }}
				in {{ $p->nama_tabel }}
			</small>
		</div>
	</div>

	<h4>{{ $p->judul }}</h4>
	<p>{!! str_limit(strip_tags($p->isi), 200) !!}</p>
</div>
<div class="row-post">
	<div class="col-xs-4">
		<a href="#">5 <i class="fa fa-heart"></i></a>
	</div>
	<div class="col-xs-4  text-center">
		<a href="#">10 <i class="fa fa-comments"></i></a>
	</div>
	<div class="col-xs-4  text-right">
		<a href="#">65 <i class="fa fa-share-alt"></i></a>
	</div>

	<div class="clearfix">

	</div>
</div>
<br>
