<div class="col-md-4 col-sm-6">
	<div class="thumbnail" style="height:270px;">
		<a href="/kajian/{{ $kajian->id }}-{{ str_slug($kajian->tema) }}">
			@if ($kajian->brosur)
			<img src="/{{ $kajian->brosur }}" alt="">
			@endif
			<div class="thumbnail-block">
			</div>
			<div class="caption">
				<h2>{{ $kajian->tema }}</h2>
				{{ $kajian->ustadz ? $kajian->ustadz->ustadz_name : '' }}<br />
				<em>Waktu disini nanti</em>
			</div>
		</a>
	</div>
</div>
