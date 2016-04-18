<h4 class="title">AKTUAL</h4>
<div class="row">
	@foreach ($artikel as $a)
	<div class="col-md-4">
		<div class="thumbnail">
			<a href="/artikel/show"><img src="http://www.salamdakwah.com/{{ $a->img_artikel }}" style="width:100%" alt=""></a>
			<div class="caption">
				<h4><a href="/artikel/show">{{ $a->judul }}</a></h4>
				<b>{{ $a->user->name }}</b><br />
				<em>{{ $a->updated->diffForHumans() }}</em>
			</div>
		</div>
	</div>
	@endforeach
</div>
