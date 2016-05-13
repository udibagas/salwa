<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="" style="height:40px;" /></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

      <form class="navbar-form navbar-left" method="GET" action="/search" style="margin-left:20px;">
        <div class="form-group">
			<div class="input-group">
				<input type="search" name="q" placeholder="Search" class="form-control">
				<div class="input-group-addon"><i class="fa fa-search"></i></div>
			</div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
          <li class="@if (url()->current() == url('video')) active @endif"><a href="/video">Salwa Video</a></li>
		  <li class="@if (url()->current() == url('artikel')) active @endif"><a href="/artikel">Salwa Aktual</a></li>
		  <li class="@if (url()->current() == url('pertanyaan')) active @endif"><a href="/pertanyaan">Tanya Ustadz</a></li>
		  <li class="@if (url()->current() == url('forum')) active @endif"><a href="/forum">Salwa Forum</a></li>
		  <li class="@if (url()->current() == url('produk')) active @endif"><a href="/produk">Salwa Market</a></li>
		  <li class="@if (url()->current() == url('peduli')) active @endif"><a href="/peduli">Salwa Peduli</a></li>
		  @if (Auth::guest())
		  <li class="@if (url()->current() == url('register')) active @endif"><a href="/register">Daftar/Masuk</a></li>
		  @else
		  <li class="@if (url()->current() == url('me')) active @endif"><a href="/me">{{ Auth::user()->name }}</a></li>
		  <li class=""><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
		  @endif
      </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
