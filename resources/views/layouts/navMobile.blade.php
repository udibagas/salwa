<div class="mobile-nav">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-8" style="padding-right:0;margin-right:0;">
				<a id="menu" href="#sidr-main"><i class="fa fa-bars"></i></a>
				<a href="/" class="logo text-white text-right" style="font-size:17px;">
					<img src="/images/logo-shadow.png" alt="" style="height:35px;margin-left:8px;display:inline-block;margin-top:-9px;" /> SalamDakwah
				</a>
			</div>
			<div class="col-xs-4 text-right" style="padding-left:0;margin-left:0;">
				@if (auth()->check())
				<a href="/me"><i class="fa fa-user"></i></a>
				<a href="/logout"><i class="fa fa-sign-out"></i></a>
				@else
				<a href="/register"><i class="fa fa-edit"></i></a>
				<a href="/login"><i class="fa fa-sign-in"></i></a>
				@endif
				@if (url()->current() != route('home') && url()->current() != route('home1'))
				<a id="menu-right" href="#sidr-right"><i class="fa fa-search"></i></a>
				@endif
			</div>
		</div>
	</div>
</div>
