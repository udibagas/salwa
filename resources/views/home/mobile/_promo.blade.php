<div class="row-post">
	<div id="myCarousel1" class="carousel slide carousel-promo" data-ride="carousel" style="max-height:118px;">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php $i = 0; ?>
			@foreach ($promo as $p)
			<li data-target="#myCarousel1" data-slide-to="{{ $i }}" class="@if ($i == 0) active @endif"></li>
			<?php $i++ ?>
			@endforeach
		</ol>
		<div class="carousel-inner" role="listbox" style="max-height:118px;">
			<?php $i = 0; ?>
			@foreach ($promo as $p)
			<?php $i++ ?>
			@if ($pos = $p->positions()->first())
			<div class="item @if ($i == 1) active @endif" style="max-height:118px;">
				<a href="{{ $pos->pivot->url }}" target="_blank">
					<img class="first-slide" src="/{{ $pos->pivot->img_banner }}" alt="{{ $p->name }}" style="width:882px;height:118px;margin:auto;">
				</a>
			</div>
			@endif
			@endforeach
		</div>
		<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div><!-- /.carousel -->
</div>
