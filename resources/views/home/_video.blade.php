<h4 class="title"><i class="fa fa-video-camera"></i> SALWA VIDEO</h4>
<div id="myCarouselVideo" class="carousel slide" data-ride="carousel" style="min-height:270px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarouselVideo" data-slide-to="0" class="active"></li>
    <li data-target="#myCarouselVideo" data-slide-to="1"></li>
    <li data-target="#myCarouselVideo" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox" style="min-height:270px;">
	  <?php $i = 0; ?>

	  @foreach ($videoRandom->chunk(3) as $chunk)
			  <?php $i++ ?>
			<div class="item @if ($i == 1) active @endif" style="min-height:270px;">
				<div class="row no-gutter">
					@each('video._list', $chunk, 'video')
				</div>
			</div>

		@endforeach


  </div>
  <a class="left carousel-control" href="#myCarouselVideo" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarouselVideo" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.carousel -->
