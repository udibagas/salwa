<div class="container-fluid mobile-nav">
	<div class="row">
		<div class="col-xs-4" style="padding:8px 15px;font-size:20px;">
			<a id="menu" href="#sidr-main" style="color:#fff;"><i class="fa fa-bars"></i></a>
		</div>
		<div class="col-xs-4 text-center">
			<img src="/images/logo-shadow.png" alt="" style="height:50px;" />
		</div>
		<div class="col-xs-4 text-right" style="padding:8px 15px;font-size:20px;">
			@if (url()->current() != route('home') && url()->current() != route('home1'))
			<a id="menu-right" href="#sidr-right" style="color:#fff;"><i class="fa fa-search"></i></a>
			@endif
		</div>
	</div>
</div>
