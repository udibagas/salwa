<h4 class="title" style="margin:0;">DO'A</h4>
<div  style="padding:20px;border:1px solid #8EC7FB;margin:0;">
	@foreach ($doa as $d)
		<div class="underlined">
			<a href="/hadist/{{ $d->hadist_id }}-{{ str_slug($d->judul) }}">
				<h4><i class="fa fa-heartbeat"></i> {{ $d->judul }}</h4>
			</a>
		</div>
	@endforeach
</div>
