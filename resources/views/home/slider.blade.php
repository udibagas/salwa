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
			<a href="/artikel/{{ $a->artikel_id }}-{{ str_slug($a->judul) }}">
				<img src="http://www.salamdakwah.com/{{ $a->img_artikel }}" class="img-responsive" style="height:100%" />
				<div class="thumbnail-block">
					<div class="tilecaption">
						<h3><i class="fa fa-clock-o"></i> SALWA AKTUAL</h3>
						<h4>{{ $a->judul }}</h4>
						{{ $a->user ? $a->user->name : '' }} | {{ $a->updated->diffForHumans() }}
					</div>
				</div>
			</a>
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
  			 <a href="/image/{{ $image->id_salwaimages }}-{{ str_slug($image->judul) }}">
				 <div class="thumbnail-block">
					 <img src="http://www.salamdakwah.com/{{ $image->img_images }}" class="img-responsive"/>
				 </div>
			 </a>
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
				 <a href="/video/{{ $v->video_id }}-{{ str_slug($v->title) }}">
		  		 <img src="http://www.salamdakwah.com/{{ $v->img_video }}" class="img-responsive"/>
				 <div class="video-block">
					 <div class="tilecaption">
						 <h3><i class="fa fa-video-camera"></i> SALWA VIDEO</h3>
						 <h3>{{ $v->title }}</h3>
						 {{ $v->user->name }}
					 </div>
				 </div>
				 </a>
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
				<a href="/pertanyaan/{{ $v->pertanyaan_id }}-{{ str_slug($v->judul_pertanyaan) }}">
					<div class="thumbnail-block">
						<div class="tilecaption">
							<h3><i class="fa fa-question-circle"></i> TANYA USTADZ</h3>
							<h3>{{ $v->judul_pertanyaan }}</h3>
							{{ $v->user->name }} | {{ $v->updated->diffForHumans() }}
						</div>
					</div>
			   </a>
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
			<a href="/peduli/{{ $a->peduli_id }}-{{ str_slug($a->judul) }}">
				@if ($a->img_artikel)
				<img src="http://www.salamdakwah.com/{{ $a->img_artikel }}" class="img-responsive" style="width:100%"/>
				@endif
				<div class="thumbnail-block">
					<div class="tilecaption">
						<h3><i class="fa fa-heart"></i> SALWA PEDULI</h3>
						<h3>{{ $a->judul }}</h3>
						{{ $a->updated->diffForHumans() }}
					</div>
				</div>
	   		</a>
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
			  <a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
			  <div class="thumbnail-block">
				  <div class="tilecaption">
					  <h3><i class="fa fa-comment"></i> FORUM</h3>
					  <h3>{{ $f->title }}</h3>
					  {{ $f->user->name }} | {{ $f->updated->diffForHumans() }}
				  </div>
			  </div>
			  </a>
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
				  <a href="/informasi/{{ $a->informasi_id }}-{{ str_slug($a->judul) }}">
				  @if ($a->img_gambar)
				  <img src="http://www.salamdakwah.com/{{ $a->img_gambar }}" class="img-responsive" style="width:100%" />
				  @endif
				  <div class="thumbnail-block">
					  <div class="tilecaption">
						  <h3><i class="fa fa-info-circle"></i> SALWA INFO</h3>
						  <h3>{{ $a->judul }}</h3>
						  {{ $a->updated->diffForHumans() }}
					  </div>
				  </div>
				  </a>
		  	  </div>
		  	  <?php $i++; ?>
			  @endforeach
          </div>
        </div>

		</div>
	</div>

</div>
</div>
