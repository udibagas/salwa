<div id="myCarousel1" class="carousel slide carousel-promo" data-ride="carousel" style="height:170px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel1" data-slide-to="1"></li>
    <li data-target="#myCarousel1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox" style="height:170px;">
	  <?php $i = 0; ?>
	  @foreach ($promo as $p)
	  <?php $i++ ?>
    <div class="item @if ($i == 1) active @endif" style="height:170px;">
      <img class="first-slide" src="http://www.salamdakwah.com/{{ $p->img_banner }}" alt="First slide" style="width:100%;">
    </div>
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
