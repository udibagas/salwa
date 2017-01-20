<h4 class="title"><i class="fa fa-edit"></i> KAJIAN HARI INI</h4>
<div id="myCarousel2" class="carousel slide carousel-promo" data-ride="carousel" style="max-height:200px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
	  <?php $h = 0; ?>
	  @foreach ($today->chunk(4) as $chunk)
    <li data-target="#myCarousel2" data-slide-to="{{$h}}" class="@if ($h==0) active @endif"></li>
	<?php $h++; ?>
	@endforeach
  </ol>
  <div class="carousel-inner" role="listbox" style="max-height:200px;">
	  <?php $i = 0; ?>

	  @foreach ($today->chunk(4) as $chunk)
			  <?php $i++ ?>
			<div class="item @if ($i == 1) active @endif" style="max-height:200px;">
				<div class="row no-gutter">
					@each('kajian-old._list', $chunk, 'kajian')
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
