<div class="container-fluid dynamicTile">
<div class="row ">
	<div class="col-sm-2 col-xs-6">
		<div id="tile2" class="tile">

         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
			  <?php $i = 0; ?>
  		  @foreach ($artikel as $a)
  		<div class="item @if ($i == 0) active @endif">
  			<div class="tilecaption">
				<h3><i class="fa fa-clock-o"></i> <u>SALWA AKTUAL</u></h3>
				<h4><a href="#">{{ $a->judul }}</a></h4>
				<strong>{{ $a->user ? $a->user->name : '' }} | {{ $a->updated->diffForHumans() }}</strong>
			</div>
  		   <a href="#"><img src="http://www.salamdakwah.com/{{ $a->img_artikel }}" class="img-responsive" style="height:100%" /></a>
  		</div>
  		<?php $i++; ?>
  		@endforeach
          </div>
        </div>

		</div>
	</div>
    <div class="col-sm-2 col-xs-6">
    	<div id="tile1" class="tile">

         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
			  <?php $i = 0; ?>
  			@foreach ($images as $image)
  		  <div class="item @if ($i == 0) active @endif">
  			 <a href="#"><img src="http://www.salamdakwah.com/{{ $image->img_images }}" class="img-responsive"/></a>
  		  </div>
  		  <?php $i++; ?>
  		  @endforeach
          </div>
        </div>

    	</div>
	</div>
	<div class="col-sm-4 col-xs-12">
		<div id="tile3" class="tile">

        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
			  <?php $i = 0; ?>
		  		@foreach ($videos as $v)
		  	  <div class="item @if ($i == 0) active @endif">
		  		 <img src="http://www.salamdakwah.com/{{ $v->img_video }}" class="img-responsive"/>
		  		 <div class="tilecaption">
					 <h3><i class="fa fa-video-camera"></i> <u>SALWA VIDEO</u></h3>
					 <h3><a href="#">{{ $v->title }}</a></h3>
					 <strong>{{ $v->user->name }}</strong>
				 </div>
		  	  </div>
		  	  <?php $i++; ?>
		  	  @endforeach
            </div>
         </div>
		</div>
	</div>
	<div class="col-sm-4 col-xs-12">
		<div id="tile4" class="tile">

        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
			  <?php $i = 0; ?>
  			  @foreach ($pertanyaan as $v)
  			<div class="item @if ($i == 0) active @endif">
  			   <div class="tilecaption">
				   <h3><i class="fa fa-question-circle"></i> <u>TANYA USTADZ</u></h3>
				   <h3><a href="#">{{ $v->judul_pertanyaan }}</a></h3>
				   <strong>{{ $v->user->name }} | {{ $v->updated->diffForHumans() }}</strong>
			   </div>
  			</div>
  			<?php $i++; ?>
  			@endforeach
          </div>
        </div>

		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-4 col-xs-12">
		<div id="tile7" class="tile">

        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
			  <?php $i = 0; ?>
  		  @foreach ($peduli as $a)
  		<div class="item @if ($i == 0) active @endif">
  			<div class="tilecaption">
				<h3><i class="fa fa-heart"></i> <u>SALWA PEDULI</u></h3>
				<h3><a href="#">{{ $a->judul }}</a></h3>
				<strong>{{ $a->updated->diffForHumans() }}</strong>
			</div>
  		   <a href="#"><img src="http://www.salamdakwah.com/{{ $a->img_artikel }}" class="img-responsive" style="width:100%"/></a>
  		</div>
  		<?php $i++; ?>
  		@endforeach
          </div>
        </div>

		</div>
	</div>
	<div class="col-sm-4 col-xs-12">
		<div id="tile8" class="tile">

         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
			  <?php $i = 0; ?>
  			@foreach ($forum as $f)
  		  <div class="item @if ($i == 0) active @endif">
  			 <div class="tilecaption">
  				 <h3><i class="fa fa-comment"></i> <u>FORUM</u></h3>
  				 <h3><a href="#">{{ $f->title }}</a></h3>
  				 <strong>{{ $f->user->name }} | {{ $f->updated->diffForHumans() }}</strong>
  			 </div>
  		  </div>
  		  <?php $i++; ?>
  		  @endforeach
            </div>
         </div>

		</div>
	</div>
	<div class="col-sm-4 col-xs-12">
		<div id="tile10" class="tile">
           <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
			  <?php $i = 0; ?>
		  		@foreach ($infoHome as $a)
		  	  <div class="item @if ($i == 0) active @endif">
		  		  <div class="tilecaption">
		  			  <h3><i class="fa fa-info-circle"></i> <u>SALWA INFO</u></h3>
		  			  <h3><a href="#">{{ $a->judul }}</a></h3>
		  			  <strong>{{ $a->updated->diffForHumans() }}</strong>
		  		  </div>
				  @if ($a->img_gambar)
		  		 <a href="#"><img src="http://www.salamdakwah.com/{{ $a->img_gambar }}" class="img-responsive" style="width:100%" /></a>
				 @endif
		  	  </div>
		  	  <?php $i++; ?>
			  @endforeach
          </div>
        </div>

		</div>
	</div>

</div>
</div>
