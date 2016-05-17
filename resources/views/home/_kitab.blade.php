<div id="myCarousel3" class="carousel slide carousel-promo" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel3" data-slide-to="1"></li>
    <li data-target="#myCarousel3" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
	  <?php $i = 0; ?>

	  @foreach ($buku->chunk(6) as $chunk)
			  <?php $i++ ?>
			<div class="item @if ($i == 1) active @endif">
				<div class="row no-gutter">
					@foreach ($chunk as $b)
					<div class="col-md-2">
						<div class="thumbnail">
							<a href="/kitab/{{ $b->buku_id }}-{{ str_slug($b->judul) }}">


								<img src="/{{ $b->img_buku }}" class="img-responsive" style="width:100%;height:270px;">

								<div class="thumbnail-block">
									<div class="caption">
										<h4>{{ $b->judul }}</h4>
										{{ $b->penulis }}
									</div>
								</div>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>

		@endforeach


  </div>
  <a class="left carousel-control" href="#myCarousel3" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel3" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.carousel -->
