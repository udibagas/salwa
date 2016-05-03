<div class="container-fluid dynamicTile">
	<div class="row ">
	    <div class="col-sm-6 col-xs-6">
	    	<div id="tile1" class="tile">

	         <div class="carousel slide" data-ride="carousel">
	          <!-- Wrapper for slides -->
	          <div class="carousel-inner">
				  <?php $i = 0; ?>
				  @foreach ($videos as $v)
	            <div class="item @if ($i == 0) active @endif">
	               <img src="http://www.salamdakwah.com/{{ $v->img_video }}" class="img-responsive"/>
	            </div>
				<?php $i++; ?>
				@endforeach
	          </div>
	        </div>

	    	</div>
		</div>
	    <div class="col-sm-3 col-xs-3">
	    	<div id="tile1" class="tile">

	         <div class="carousel slide" data-ride="carousel">
	          <!-- Wrapper for slides -->
	          <div class="carousel-inner">
				  <?php $i = 0; ?>
				  @foreach ($videos as $v)
	            <div class="item @if ($i == 0) active @endif">
	               <img src="http://www.salamdakwah.com/{{ $v->img_video }}" class="img-responsive"/>
	            </div>
				<?php $i++; ?>
				@endforeach
	          </div>
	        </div>

	    	</div>
		</div>
	    <div class="col-sm-3 col-xs-3">
	    	<div id="tile1" class="tile">

	         <div class="carousel slide" data-ride="carousel">
	          <!-- Wrapper for slides -->
	          <div class="carousel-inner">
				  <?php $i = 0; ?>
				  @foreach ($videos as $v)
	            <div class="item @if ($i == 0) active @endif">
	               <img src="http://www.salamdakwah.com/{{ $v->img_video }}" class="img-responsive"/>
	            </div>
				<?php $i++; ?>
				@endforeach
	          </div>
	        </div>

	    	</div>
		</div>
	</div>
</div>
