<h4 class="title"><i class="fa fa-clock-o"></i> AKTUALITA</h4>
<div id="myCarousel2" class="carousel slide carousel-promo" data-ride="carousel" style="max-height:200px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel2" data-slide-to="1"></li>
    <li data-target="#myCarousel2" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox" style="max-height:200px;">
	  <?php $i = 0; ?>

	  @foreach ($artikel->chunk(4) as $chunk)
			  <?php $i++ ?>
			<div class="item @if ($i == 1) active @endif" style="max-height:200px;">
				<div class="row no-gutter">
					@each('artikel._list', $chunk, 'artikel')
				</div>
			</div>

		@endforeach


  </div>
  <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.carousel -->
