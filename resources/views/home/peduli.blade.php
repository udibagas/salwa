<h4 class="title">SALWA PEDULI</h4>
<div class="row">
	@foreach ($peduli as $p)
	<div class="col-md-4">
		<div class="thumbnail">
			<a href="/peduli/show"><img src="http://www.salamdakwah.com/{{ $p->img_artikel }}" style="width:100%" alt=""></a>
			<div class="caption">
				<h4><a href="/peduli/show">{{ $p->judul }}</a></h4>
				<em>{{ $p->updated->diffForHumans() }}</em>
			</div>
		</div>
	</div>
	@endforeach
</div>
