<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
	  <?php $i = 0; ?>
	  @foreach ($slider as $s)
	  <?php $i++ ?>
    <div class="item @if ($i == 1) active @endif">
      <img class="first-slide" src="http://www.salamdakwah.com/{{ $s->img_video }}" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <a href="#"><h1>{{ $s->title }}</h1></a>
        </div>
      </div>
    </div>
	@endforeach
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.carousel -->
